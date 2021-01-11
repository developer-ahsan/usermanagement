<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;
use Response;
use App\products;
use App\records;
use App\User;
use DB;
use File;
use App\GroupRegistration;
use App\Order;
use App\OrderDetail;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function storeblog(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:50000'
            ],[
            'title.required' => ' The Name field is required.',
            'description.required' => ' The Description field is required.'
            ]); 

        if( $request->hasFile('image')) {
          
            $getimageName = time().'.'.$request->image->getClientOriginalExtension();
            $filepath = $request->image->move(storage_path('images'), $getimageName);
        }else{
                $getimageName = 'blog.png';
        }  
        if( $request->hasFile('homeimage')) {
          
            $getimageName1 = time().'1.'.$request->homeimage->getClientOriginalExtension();
            $filepath = $request->homeimage->move(storage_path('images'), $getimageName1);
        }else{
                $getimageName1 = 'blog.png';
        }
        $dis=DB::table('blogs')
                ->insert([
                    'title' => $request->title,
                    'subheading' => $request->subheading,
                    'description' => $request->description,         
                    'homedescription' => $request->homedescription,
                    'slug' => $request->slug,         
                    'homeimage' => 'storage/images/'.$getimageName1,         
                    'image' => 'storage/images/'.$getimageName 
                ]);
         
        return redirect('/blogslist')->with('message', 'Blog Added Succesfully.');
    }

    public function updateblog(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:50000'
            ],[
            'title.required' => ' The Name field is required.',
            'description.required' => ' The Description field is required.'
            ]); 
        if( $request->hasFile('image')) {
          
            $getimageName = time().'.'.$request->image->getClientOriginalExtension();
            $filepath = $request->image->move(storage_path('images'), $getimageName);
            $dis=DB::table('blogs')->where('id',$request->id)
                ->update([
                    'title' => $request->title,
                    'subheading' => $request->subheading,
                    'description' => $request->description,         
                    'homedescription' => $request->homedescription,  
                    'slug' => $request->slug,                
                    'image' => 'storage/images/'.$getimageName         
                ]);
        }else{
                $dis=DB::table('blogs')->where('id',$request->id)
                        ->update([
                                'title' => $request->title,
                                'subheading' => $request->subheading,
                                'description' => $request->description,         
                                'homedescription' => $request->homedescription,
                                'slug' => $request->slug
                            ]);
        }
        if( $request->hasFile('homeimage')) {
          
            $getimageName1 = time().'1.'.$request->homeimage->getClientOriginalExtension();
            $filepath = $request->homeimage->move(storage_path('images'), $getimageName1);
            $dis=DB::table('blogs')->where('id',$request->id)
                ->update([
                    'title' => $request->title,
                    'subheading' => $request->subheading,
                    'description' => $request->description,         
                    'homedescription' => $request->homedescription,
                    'slug' => $request->slug,                 
                    'homeimage' => 'storage/images/'.$getimageName1         
                ]);
        }else{
                $dis=DB::table('blogs')->where('id',$request->id)
                        ->update([
                                'title' => $request->title,
                                'subheading' => $request->subheading,
                                'description' => $request->description,
                                'homedescription' => $request->homedescription,
                                'slug' => $request->slug
                            ]);
        }             
        return redirect('/blogslist')->with('message', 'Blog Updated Succesfully.');
    }

    public function updategallery(Request $request)
    {
        if( $request->hasFile('image')) {
          
            $getimageName = time().'.'.$request->image->getClientOriginalExtension();
            $filepath = $request->image->move(storage_path('images'), $getimageName);
            $dis=DB::table('gallery')->where('id',$request->id)
                ->update([     
                    'title' => $request->title,         
                    'image' => 'storage/images/'.$getimageName         
                ]);
        } else{
            $dis=DB::table('gallery')->where('id',$request->id)
                ->update([     
                    'title' => $request->title        
                ]);
        }
        return redirect('/gallerylist')->with('message', 'Image Updated Succesfully.');
    }

    public function storeproduct(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'quantity' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products'
            ],[
            'title.required' => 'The Title field is required.',
            'price.required' => 'The Price field is required.',
            'quantity.required' => 'The Quantity field is required.',
            'sku.required' => 'The Sku field is required.',
            'slug.required' => 'The Slug field is required.'
        ]); 

        if( $request->hasFile('image')) {

            $getimageName = time().'.'.$request->image->getClientOriginalExtension();
            $filepath = $request->image->move(storage_path('images'), $getimageName);
        }else{
                $getimageName = 'blog.png';
        }                   
        $dis=DB::table('products')
                ->insert([
                    'title' => $request->title,
                    'price' => $request->price,
                    'overview' => $request->overview,         
                    'quantity' => $request->quantity,
                    'sku' => $request->sku,
                    'category' => $request->category,
                    'tags' => $request->tags,         
                    'age' => $request->age,
                    'status' => $request->status,
                    'slug' => $request->slug,
                    'image' => 'storage/images/'.$getimageName,
                    'gstatus' => $request->gstatus,
                    'position' => $request->position
                ]);
        return redirect('/productslist')->with('message', 'Product Added Succesfully.');
    }

    public function storedeal(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string|max:255',
            'price' => 'required|string|max:255'
            ],[
            'title.required' => 'The Title field is required.',
            'price.required' => 'The Price field is required.'
        ]); 

        if( $request->hasFile('image')) {

            $getimageName = time().'.'.$request->image->getClientOriginalExtension();
            $filepath = $request->image->move(storage_path('images'), $getimageName);
        }else{
                $getimageName = 'blog.png';
        }                   
        $dis=DB::table('products')
                ->insert([
                    'title' => $request->title,
                    'price' => $request->price,
                    'min' => $request->minpersons,
                    'max' => $request->maxpersons,
                    'quantity' => $request->quantity,
                    'percentage' => $request->percentage,
                    'overview' => $request->overview,
                    'isdeal' => '1',
                    'image' => 'storage/images/'.$getimageName
                ]);
        return redirect('/dealslist')->with('message', 'Deal Added Succesfully.');
    }

    public function registerbirthday(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'outdoorprice' => 'required|string|max:255'
            ],[
            'title.required' => 'The Title field is required.',
            'price.required' => 'The Price field is required.',
            'outdoorprice.required' => 'The out door train price field is required.'
        ]); 

        if( $request->hasFile('image')) {

            $getimageName = time().'.'.$request->image->getClientOriginalExtension();
            $filepath = $request->image->move(storage_path('images'), $getimageName);
        }else{
                $getimageName = 'blog.png';
        }                   
        $dis=DB::table('products')
                ->insert([
                    'title' => $request->title,
                    'price' => $request->price,
                    'outdoorprice' => $request->outdoorprice,
                    'overview' => $request->overview,
                    'min' => $request->minpersons, 
                    'slug' => $request->slug, 
                    'isdeal' => '2',
                    'image' => 'storage/images/'.$getimageName
                ]);
        return redirect('/birthdaylist')->with('message', 'Birthday Package Added Succesfully.');
    }

    public function registerbanner(Request $request)
    {
        if($request->hasFile('homebanner')){
            
            $getimageName = time().'.'.$request->homebanner->getClientOriginalExtension();
            $filepath = $request->homebanner->move(storage_path('images'), $getimageName);
            $homebanner = 'storage/images/'.$getimageName;
        } else{
            $homebanner = null;
        }
        if($request->hasFile('outdoorbanner')){
            
            $getimageName1 = time().'1.'.$request->outdoorbanner->getClientOriginalExtension();
            $filepath1 = $request->outdoorbanner->move(storage_path('images'), $getimageName1);
            $outdoorbanner = 'storage/images/'.$getimageName1;
        } else{
            $outdoorbanner = null;
        }
        if($request->hasFile('grouppricebanner')){
            
            $getimageName2 = time().'2.'.$request->grouppricebanner->getClientOriginalExtension();
            $filepath2 = $request->grouppricebanner->move(storage_path('images'), $getimageName2);
            $grouppricebanner = 'storage/images/'.$getimageName2;
        } else{
            $grouppricebanner = null;
        }
        if($request->hasFile('dealbanner')){
            
            $getimageName3 = time().'3.'.$request->dealbanner->getClientOriginalExtension();
            $filepath3 = $request->dealbanner->move(storage_path('images'), $getimageName3);
            $dealbanner = 'storage/images/'.$getimageName3;
        } else{
            $dealbanner = null;
        }
        if($request->headertext){
            $headertext = $request->headertext;
        } else{
            $headertext = null;
        }
        $dis=DB::table('banner')
                ->insert([
                    'homebanner' => $homebanner,
                    'outdoorbanner' => $outdoorbanner,
                    'grouppricebanner' => $grouppricebanner,
                    'dealbanner' => $dealbanner,
                    'left_text'=> $left_text,
                    'right_text'=> $right_text,
                ]);
        return redirect('/bannerslist')->with('message', 'Banner Added Succesfully.');
    }

    public function registergallery(Request $request)
    {
        if($request->hasFile('image')){
            
            $getimageName = time().'.'.$request->image->getClientOriginalExtension();
            $filepath = $request->image->move(storage_path('images'), $getimageName);
            $image = 'storage/images/'.$getimageName;
        } else{
            $image = null;
        }
        $dis=DB::table('gallery')
                ->insert([
                    'title' => $request->title,
                    'image' => $image
                ]);
        return redirect('/gallerylist')->with('message', 'Image Added Succesfully.');
    }

    public function registersocialmedia(Request $request)
    {
        if($request->hasFile('image')){
            
            $getimageName = time().'.'.$request->image->getClientOriginalExtension();
            $filepath = $request->image->move(storage_path('images'), $getimageName);
            $image = 'storage/images/'.$getimageName;
        } else{
            $image = null;
        }
        DB::table('socialmedia')
            ->insert([
                'title' => $request->title,
                'url' => $request->url,
                'image' => $image
        ]);
        return redirect('/socialmedialist')->with('message', 'Icon Added Succesfully.');
    }

    public function registerseo(Request $request)
    {
        $dis=DB::table('seo')
                ->insert([
                    'slug' => $request->slug,
                    'metatagtitle' => $request->metatagtitle,
                    'metatagdescription' => $request->metatagdescription,
                    'metatagkeywords' => $request->metatagkeywords
                ]);
        return redirect('/seolist')->with('message', 'Seo Added Succesfully.');
    }

    public function registervideo(Request $request)
    {
        // dd($request->all());
        // if($request->video == null && $request->outdoorvideo == null){
            
        //     return redirect('/videolist')->with('error', 'Please Upload a Video.');

        // } else{

            // if($request->video->getClientOriginalExtension() == "mp4" && $request->outdoorvideo->getClientOriginalExtension() == "mp4")
            // {
                if($request->hasFile('video')){

                    $getvideoName = time().'.'.$request->video->getClientOriginalExtension();
                    $filepath = $request->video->move(storage_path('images'), $getvideoName);
                    $video = 'storage/images/'.$getvideoName;
                
                   
                } else{

                    $video = null;
                }
                if($request->hasFile('outdoorvideo')){

                    $getoutdoorvideoName = time().'1.'.$request->outdoorvideo->getClientOriginalExtension();
                    $filepath = $request->outdoorvideo->move(storage_path('images'), $getoutdoorvideoName);
                    $outdoorvideo = 'storage/images/'.$getoutdoorvideoName;
                
                   
                } else{

                    $outdoorvideo = null;
                }

                DB::table('video')
                    ->insert([
                        'video' => $video,
                        'outdoorvideo' => $outdoorvideo
                    ]);
                return redirect('/videolist')->with('message', 'Please Uploaded Succesfully.');

            // }
            // else{
            //     return redirect('/video')->with('error', 'Please uploade mp4 file.');
            // }    
        // }
    }


    public function updatebanner(Request $request)
    {
        if( $request->hasFile('homebanner')) {
            $getimageName = time().'.'.$request->homebanner->getClientOriginalExtension();
            $filepath = $request->homebanner->move(storage_path('images'), $getimageName);
            $dis=DB::table('banner')->where('id',$request->id)
                ->update([
                    'homebanner' => 'storage/images/'.$getimageName
                ]);
        }   
        if( $request->hasFile('outdoorbanner')) {
            $getimageName = time().'1.'.$request->outdoorbanner->getClientOriginalExtension();
            $filepath = $request->outdoorbanner->move(storage_path('images'), $getimageName);
            $dis=DB::table('banner')->where('id',$request->id)
                ->update([
                    'outdoorbanner' => 'storage/images/'.$getimageName
                ]);
        }   
        if( $request->hasFile('grouppricebanner')) {
            $getimageName = time().'2.'.$request->grouppricebanner->getClientOriginalExtension();
            $filepath = $request->grouppricebanner->move(storage_path('images'), $getimageName);
            $dis=DB::table('banner')->where('id',$request->id)
                ->update([
                    'grouppricebanner' => 'storage/images/'.$getimageName
                ]);
        }     
        if( $request->hasFile('dealbanner')) {
            $getimageName = time().'2.'.$request->dealbanner->getClientOriginalExtension();
            $filepath = $request->dealbanner->move(storage_path('images'), $getimageName);
            $dis=DB::table('banner')->where('id',$request->id)
                ->update([
                    'dealbanner' => 'storage/images/'.$getimageName
                ]);
        }       
        if($request->headertext) {
            $dis=DB::table('banner')->where('id',$request->id)
                ->update([
                    'headertext' => $request->headertext
                ]);
        }   
        if($request->left_text) {
            $dis=DB::table('banner')->where('id',$request->id)
                ->update([
                    'left_text' => $request->left_text
                ]);
        } 
        if($request->right_text) {
            $dis=DB::table('banner')->where('id',$request->id)
                ->update([
                    'right_text' => $request->right_text
                ]);
        } 
        return redirect('/bannerslist')->with('message', 'Banner Updated Succesfully.');
    }

    public function updatedeal(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string|max:255',
            'price' => 'required|string|max:255'
            ],[
            'title.required' => 'The Title field is required.',
            'price.required' => 'The Price field is required.'
        ]);

        if( $request->hasFile('image')) {

            $getimageName = time().'.'.$request->image->getClientOriginalExtension();
            $filepath = $request->image->move(storage_path('images'), $getimageName);
            $dis=DB::table('products')->where('id',$request->id)
                ->update([
                    'title' => $request->title,
                    'price' => $request->price,
                    'percentage' => $request->percentage,
                    'overview' => $request->overview,
                    'min' => $request->minpersons,         
                    'max' => $request->maxpersons,
                    'quantity' => $request->quantity,
                    'isdeal' => '1',
                    'image' => 'storage/images/'.$getimageName
                ]);
        }else{
                $dis=DB::table('products')->where('id',$request->id)
                ->update([
                    'title' => $request->title,
                    'price' => $request->price,
                    'percentage' => $request->percentage,
                    'overview' => $request->overview,
                    'min' => $request->minpersons,         
                    'max' => $request->maxpersons,
                    'quantity' => $request->quantity,
                    'isdeal' => '1',
                ]);
        }                   
        return redirect('/dealslist')->with('message', 'Deal Updated Succesfully.');
    }

    public function updatebirthday(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'outdoorprice' => 'required|string|max:255'
            ],[
            'title.required' => 'The Title field is required.',
            'price.required' => 'The Price field is required.',
            'outdoorprice.required' => 'The out door price field is required.'
        ]);

        if( $request->hasFile('image')) {

            $getimageName = time().'.'.$request->image->getClientOriginalExtension();
            $filepath = $request->image->move(storage_path('images'), $getimageName);
            $dis=DB::table('products')->where('id',$request->id)
                ->update([
                    'title' => $request->title,
                    'price' => $request->price,
                    'outdoorprice' => $request->outdoorprice,
                    'overview' => $request->overview,
                    'min' => $request->minpersons, 
                    'slug' => $request->slug, 
                    'isdeal' => '2',
                    'image' => 'storage/images/'.$getimageName
                ]);
        }else{
                $dis=DB::table('products')->where('id',$request->id)
                ->update([
                    'title' => $request->title,
                    'price' => $request->price,
                    'outdoorprice' => $request->outdoorprice,
                    'overview' => $request->overview,
                    'min' => $request->minpersons,
                    'slug' => $request->slug, 
                    'isdeal' => '2',
                ]);
        }                   
        return redirect('/birthdaylist')->with('message', 'Birthday Package Updated Succesfully.');
    }

    public function updateproduct(Request $request)
    {
        if( $request->hasFile('image')) {
          
            $getimageName = time().'.'.$request->image->getClientOriginalExtension();
            $filepath = $request->image->move(storage_path('images'), $getimageName);
            $dis=DB::table('products')->where('id',$request->id)
                ->update([
                    'title' => $request->title,
                    'price' => $request->price,
                    'overview' => $request->overview,         
                    'quantity' => $request->quantity,
                    'sku' => $request->sku,
                    'category' => $request->category,
                    'tags' => $request->tags,         
                    'age' => $request->age,
                    'status' => $request->status,
                    'slug' => $request->slug, 
                    'image' => 'storage/images/'.$getimageName,
                    'gstatus' => $request->gstatus,
                    'position' => $request->position
                ]);
        }else{
                $dis=DB::table('products')->where('id',$request->id)
                ->update([
                    'title' => $request->title,
                    'price' => $request->price,
                    'overview' => $request->overview,         
                    'quantity' => $request->quantity,
                    'sku' => $request->sku,
                    'category' => $request->category,
                    'tags' => $request->tags,         
                    'age' => $request->age,
                    'status' => $request->status,
                    'slug' => $request->slug,
                    'gstatus' => $request->gstatus,
                    'position' => $request->position
                ]);
        }                   
        return redirect('/productslist')->with('message', 'Product Updated Succesfully.');
    }

    public function updateseo(Request $request)
    {

        $dis=DB::table('seo')->where('id',$request->id)
        ->update([
            'slug' => $request->slug,
            'metatagtitle' => $request->metatagtitle,
            'metatagdescription' => $request->metatagdescription,
            'metatagkeywords' => $request->metatagkeywords
        ]);
        return redirect('/seolist')->with('message', 'Seo Updated Succesfully.');
    }

    public function editblog($ID)
    {
        $data = DB::table('blogs')->where('id',$ID)->first();
        return view('editblog')->with('data',$data);
    }

    public function deleteblog($ID)
    {
        $data=DB::table('blogs')->where('id',$ID)->delete();
        return redirect('/blogslist')->with('error', 'Blog Deleted Succesfully.');
    }

    public function editseo($ID)
    {
        $data = DB::table('seo')->where('id',$ID)->first();
        return view('editseo')->with('data',$data);
    }

    public function deleteseo($ID)
    {
        $data=DB::table('seo')->where('id',$ID)->delete();
        return redirect('/seolist')->with('error', 'Seo Deleted Succesfully.');
    }

    public function editexhibition($ID)
    {
        $data = DB::table('exhibition')->where('id',$ID)->first();
        return view('editexhibition')->with('data',$data);
    }

    public function deleteexhibition($ID)
    {
        $data=DB::table('exhibition')->where('id',$ID)->delete();
        return redirect('/exhibitionlist')->with('error', 'Model Deleted Succesfully.');
    }

    public function deletesuggetion($ID)
    {
        $data=DB::table('suggetions')->where('id',$ID)->delete();
        return redirect('/suggetionslist')->with('error', 'Suggetion Deleted Succesfully.');
    }

    public function vieworder($ID)
    {
        $orders = Order::with('orderdetail.product')->where('id',$ID)->first();
        // $orders->orderdetail->map(function($value) {
        //     $products = $value->product;
        //     if($products->isdeal == 1) {
        //         $price = ($products->price-($products->price*($products->percentage/100)));
        //     } elseif($products->isdeal == 2) {
        //          if($products->outdoor==1){
        //             $price = ($products->price + $products->outdoorprice);
        //         } else{
        //             $price = $data1->price;
        //         }
        //     } else {
        //         $promotion = DB::table('promotion')
        //                     ->where('status','1')
        //                     ->first();
        //         if($promotion)
        //         {
        //             $price = ($products->price-($products->price*($promotion->percentage/100)));

        //         } else {
        //             $price = $products->price;
        //         }
        //     }
        //     $products->price = $price;
        //     return $products;
        // });
        return view('orderdetail')->with('orders',$orders);
    }

    public function editproduct($ID)
    {
        $data = DB::table('products')->where('id',$ID)->first();
        return view('editproduct')->with('data',$data);
    }

    public function editbanner($ID)
    {
        $data = DB::table('banner')->where('id',$ID)->first();
        return view('editbanner')->with('data',$data);
    }

    public function editdeal($ID)
    {
        $data = DB::table('products')->where('id',$ID)->first();
        return view('editdeal')->with('data',$data);
    }

    public function editbirthday($ID)
    {
        $data = DB::table('products')->where('id',$ID)->first();
        return view('editbirthday')->with('data',$data);
    }

    public function videolist()
    {
        $videos = DB::table('video')->get();
        return view('videolist')->with('videos',$videos);
    }

    public function gallerylist()
    {
        $gallery = DB::table('gallery')->get();
        return view('gallerylist')->with('gallery',$gallery);
    }

    public function editvideo($ID)
    {
        $data = DB::table('video')->where('id',$ID)->first();
        return view('editvideo')->with('data',$data);
    }

    public function editgallery($ID)
    {
        $data = DB::table('gallery')->where('id',$ID)->first();
        return view('editgallery')->with('data',$data);
    }

    public function reviewsproduct($ID)
    {
        $data['data'] = DB::table('review')
                            ->where('product_id',$ID)
                            ->get();
        $data['name'] = DB::table('products')
                            ->select('title')
                            ->where('id',$ID)
                            ->first();
        return view('reviews')->with($data);
    }

    public function ReviewStatus(Request $request)
    {

        $review_id = $request->get('review_id');
            
        $check['check'] = DB::table('review')->where('id',$review_id)->select('status')->first();
        
        if($check['check']->status == 1)
        {
            $data = DB::table('review')->where('id',$review_id)->update(['status' => 0]);
            return response()->json(['success'=>'Status change successfully.','status'=>0]);
                                                
        } else{
            $data = DB::table('review')->where('id',$review_id)->update(['status' => 1]);    
            return response()->json(['success'=>'Status change successfully.','status'=>1]);     
        }
    }

    public function adduser(Request $request)
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }

    public function createuser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/userslist')->with('message', 'User Added Succesfully.');
    }

    public function storepromotion(Request $request)
    {
        if( $request->hasFile('image')) {
          
            $getimageName = time().'.'.$request->image->getClientOriginalExtension();
            $filepath = $request->image->move(storage_path('images'), $getimageName);
        }else{
                $getimageName = NULL;
        }
        if( $request->hasFile('featureimage')) {
          
            $getfeatureimageName = time().'1.'.$request->featureimage->getClientOriginalExtension();
            $filepath = $request->featureimage->move(storage_path('images'), $getfeatureimageName);
        }else{
                $getfeatureimageName = NULL;
        }
        if($request->status == 1){
            $data = DB::table('promotion')
                        ->where('status','1')
                        ->first();
            if($data){

                return redirect('/promotion')->with('error', '1 Promotion is already Activcated.');
            }else{
                $this->validate($request,[
                    'name' => 'required|string|max:255',
                    'percentage' => 'required'
                    ],[
                    'name.required' => ' The Name field is required.',
                    'percentage.required' => ' Value is required.'
                    ]);
                DB::table('promotion')
                ->insert([
                    'name' => $request->name,
                    'percentage' => $request->percentage,
                    'status' => $request->status,     
                    'starttime' => $request->starttime,
                    'endtime' => $request->endtime,
                    'image' => 'storage/images/'.$getimageName,
                    'featureimage' => 'storage/images/'.$getfeatureimageName
                ]);
                return redirect('/promotionslist')->with('message', 'Promotion Added Succesfully.');
            }
        } else{

            $this->validate($request,[
                'name' => 'required|string|max:255',
                'percentage' => 'required'
                ],[
                'name.required' => ' The Name field is required.',
                'percentage.required' => ' Value is required.'
                ]);
            DB::table('promotion')
            ->insert([
                'name' => $request->name,
                'percentage' => $request->percentage,
                'status' => $request->status,     
                'starttime' => $request->starttime,
                'endtime' => $request->endtime,   
                'image' => 'storage/images/'.$getimageName,
                'featureimage' => 'storage/images/'.$getfeatureimageName
            ]);
            return redirect('/promotionslist')->with('message', 'Promotion Added Succesfully.');
        }
        
    }

    public function registerevent(Request $request)
    {
        if( $request->hasFile('banner')) {
          
            $getbannerName = time().'.'.$request->banner->getClientOriginalExtension();
            $filepath = $request->banner->move(storage_path('images'), $getbannerName);
        }else{
                $getbannerName = NULL;
        }
        if($request->status == 1){
            $data = DB::table('specialevent')
                        ->where('status','1')
                        ->first();
            if($data){

                return redirect('/event')->with('error', '1 Special Event is already Activcated.');
            }else{
                DB::table('specialevent')
                ->insert([
                    'title' => $request->title,
                    'featuredescription' => $request->featuredescription,
                    'subdescription' => $request->subdescription,     
                    'description' => $request->description,     
                    'date' => $request->date,
                    'end_date' => $request->end_date,
                    'time' => $request->time,
                    'status' => $request->status,
                    'price' => $request->price,
                    'discounttag' => $request->discounttag,
                    'banner' => 'storage/images/'.$getbannerName
                ]);
                return redirect('/eventslist')->with('message', 'Special Event Added Succesfully.');
            }
        } else{

            DB::table('specialevent')
            ->insert([
                'title' => $request->title,
                    'featuredescription' => $request->featuredescription,
                    'subdescription' => $request->subdescription,     
                    'description' => $request->description,     
                    'date' => $request->date,
                    'time' => $request->time,
                    'status' => $request->status,
                    'price' => $request->price,
                    'discounttag' => $request->discounttag,
                    'banner' => 'storage/images/'.$getbannerName
            ]);
            return redirect('/eventslist')->with('message', 'Special Event Added Succesfully.');
        }
    }

    public function registerexhibition(Request $request)
    {
        if( $request->hasFile('image')) {
          
            $getimageName = time().'.'.$request->image->getClientOriginalExtension();
            $filepath = $request->image->move(storage_path('images'), $getimageName);
        }else{
                $getimageName = NULL;
        }
        DB::table('exhibition')
        ->insert([
            'title' => $request->title,
            'subdescription' => $request->subdescription,     
            'description' => $request->description,     
            'image' => 'storage/images/'.$getimageName
        ]);
        return redirect('/exhibitionlist')->with('message', 'Model Added Succesfully.');
    }

    public function updatepromotion(Request $request)
    {
        if($request->status == 1){
            $data = DB::table('promotion')
                        ->where('status','1')
                        ->first();
            if($data){

                return redirect()->back()->with('error', '1 Promotion is already Activcated.');
            }else{

                $this->validate($request,[
                    'name' => 'required|string|max:255',
                    'percentage' => 'required'
                    ],[
                    'name.required' => ' The Name field is required.',
                    'percentage.required' => ' Value is required.'
                    ]); 
                if( $request->hasFile('image')) {
                  
                    $getimageName = time().'.'.$request->image->getClientOriginalExtension();
                    $filepath = $request->image->move(storage_path('images'), $getimageName);
                    DB::table('promotion')
                        ->where('id',$request->id)
                        ->update([         
                            'image' => 'storage/images/'.$getimageName 
                        ]);
                }
                if( $request->hasFile('featureimage')) {
                  
                    $getfeatureimageName = time().'1.'.$request->featureimage->getClientOriginalExtension();
                    $filepath = $request->featureimage->move(storage_path('images'), $getfeatureimageName);
                    DB::table('promotion')
                        ->where('id',$request->id)
                        ->update([         
                            'featureimage' => 'storage/images/'.$getfeatureimageName 
                        ]);
                }  
                DB::table('promotion')
                ->where('id',$request->id)
                ->update([
                    'name' => $request->name,
                    'percentage' => $request->percentage,
                    'status' => $request->status,     
                    'starttime' => $request->starttime,
                    'endtime' => $request->endtime
                ]);

                return redirect('/promotionslist')->with('message', 'Promotion Updated Succesfully.');
            }
        } else{
            $this->validate($request,[
                'name' => 'required|string|max:255',
                'percentage' => 'required'
                ],[
                'name.required' => ' The Name field is required.',
                'percentage.required' => ' Value is required.'
                ]); 

            if( $request->hasFile('image')) {
              
                $getimageName = time().'.'.$request->image->getClientOriginalExtension();
                $filepath = $request->image->move(storage_path('images'), $getimageName);
                DB::table('promotion')
                ->where('id',$request->id)
                ->update([    
                    'image' => 'storage/images/'.$getimageName 
                ]);
            }
            if( $request->hasFile('featureimage')) {
              
                $getfeatureimageName = time().'.'.$request->featureimage->getClientOriginalExtension();
                $filepath = $request->featureimage->move(storage_path('images'), $getfeatureimageName);
                DB::table('promotion')
                ->where('id',$request->id)
                ->update([    
                    'featureimage' => 'storage/images/'.$getfeatureimageName 
                ]);
            }
            DB::table('promotion')
            ->where('id',$request->id)
            ->update([
                'name' => $request->name,
                'percentage' => $request->percentage,
                'status' => $request->status,     
                'starttime' => $request->starttime,
                'endtime' => $request->endtime
            ]);
            return redirect('/promotionslist')->with('message', 'Promotion Updated Succesfully.');
        }
    }

    public function updateevent(Request $request)
    {
        if($request->status == 1){
            $data = DB::table('specialevent')
                        ->where('status','1')
                        ->first();
            if($data){

                return redirect()->back()->with('error', '1 Special Event is already Activcated.');
            }else{

                if( $request->hasFile('banner')) {
                  
                    $getbannerName = time().'.'.$request->banner->getClientOriginalExtension();
                    $filepath = $request->banner->move(storage_path('images'), $getbannerName);
                    DB::table('specialevent')
                        ->where('id',$request->id)
                        ->update([         
                            'banner' => 'storage/images/'.$getbannerName 
                        ]);
                } 
                DB::table('specialevent')
                ->where('id',$request->id)
                ->update([
                    'title' => $request->title,
                    'featuredescription' => $request->featuredescription,
                    'subdescription' => $request->subdescription,     
                    'description' => $request->description,     
                    'date' => $request->date,
                    'time' => $request->time,
                    'status' => $request->status,
                    'price' => $request->price,
                    'discounttag' => $request->discounttag,
                    'end_date' => $request->end_date
                ]);

                return redirect('/eventslist')->with('message', 'Special Event Updated Succesfully.');
            }
        } else{
           
            if( $request->hasFile('banner')) {
              
                $getbannerName = time().'.'.$request->banner->getClientOriginalExtension();
                $filepath = $request->banner->move(storage_path('images'), $getbannerName);
                DB::table('specialevent')
                ->where('id',$request->id)
                ->update([    
                    'banner' => 'storage/images/'.$getbannerName 
                ]);
            }
            DB::table('specialevent')
            ->where('id',$request->id)
            ->update([
                'title' => $request->title,
                'featuredescription' => $request->featuredescription,
                'subdescription' => $request->subdescription,     
                'description' => $request->description,     
                'date' => $request->date,
                'time' => $request->time,
                'status' => $request->status,
                'price' => $request->price,
                'discounttag' => $request->discounttag
            ]);
            return redirect('/eventslist')->with('message', 'Special Event Updated Succesfully.');
        }
    }

    public function updateexhibition(Request $request)
    {
        if( $request->hasFile('image')) {
          
            $getimageName = time().'.'.$request->image->getClientOriginalExtension();
            $filepath = $request->image->move(storage_path('images'), $getimageName);
            DB::table('exhibition')
                ->where('id',$request->id)
                ->update([         
                    'image' => 'storage/images/'.$getimageName 
                ]);
        } 
        DB::table('exhibition')
        ->where('id',$request->id)
        ->update([
            'title' => $request->title,
            'subdescription' => $request->subdescription,     
            'description' => $request->description
        ]);
        return redirect('/exhibitionlist')->with('message', 'Model Updated Succesfully.');
    }

    public function updatevideo(Request $request)
    {
        // $this->validate($request,[
        //     'video' => 'required'
        //     ],[
        //     'video.required' => ' The Video field is required.'
        //     ]); 

        if( $request->hasFile('video')) {
          
            $getvideoName = time().'.'.$request->video->getClientOriginalExtension();
            $filepath = $request->video->move(storage_path('images'), $getvideoName);
            DB::table('video')
            ->where('id',$request->id)
            ->update([   
                'video' => 'storage/images/'.$getvideoName 
            ]);
        }
        if( $request->hasFile('outdoorvideo')) {
          
            $getoutdoorvideoName = time().'1.'.$request->outdoorvideo->getClientOriginalExtension();
            $filepath = $request->outdoorvideo->move(storage_path('images'), $getoutdoorvideoName);
            DB::table('video')
            ->where('id',$request->id)
            ->update([   
                'outdoorvideo' => 'storage/images/'.$getoutdoorvideoName 
            ]);
        }
        return redirect('/videolist')->with('message', 'Video Updated Succesfully.');
    }

    public function updatesocialmedia(Request $request)
    {
        if($request->hasFile('image')){
            
            $getimageName = time().'.'.$request->image->getClientOriginalExtension();
            $filepath = $request->image->move(storage_path('images'), $getimageName);
            DB::table('socialmedia')
                ->where('id',$request->id)
                ->update([         
                    'image' => 'storage/images/'.$getimageName 
                ]);
        } 
        DB::table('socialmedia')
        ->where('id',$request->id)
        ->update([   
            'title' => $request->title,
            'url'   => $request->url
        ]);
        return redirect('/socialmedialist')->with('message', 'Icon Updated Succesfully.');
    }

    public function edituser($ID)
    {
        $data = DB::table('users')->where('id',$ID)->first();
        return view('edituser')->with('data',$data);
    }

    public function editpromotion($ID)
    {
        $data = DB::table('promotion')->where('id',$ID)->first();
        return view('editpromotion')->with('data',$data);
    }

    public function editevent($ID)
    {
        $data = DB::table('specialevent')->where('id',$ID)->first();
        return view('editevent')->with('data',$data);
    }

    public function editsocialmedia($ID)
    {
        $data = DB::table('socialmedia')->where('id',$ID)->first();
        return view('editsocialmedia')->with('data',$data);
    }

    public function updateuser(Request $request)
    {
        if($request->password != null)
        {
            User::where('id',$request->id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);   
            return redirect('/userslist')->with('message', 'User Updated Succesfully.');
        }else
        {
            User::where('id',$request->id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email
                ]);   
            return redirect('/userslist')->with('message','User Updated Succesfully.');
        }
    }

    public function deleteproduct($ID)
    {
        $data=DB::table('products')->where('id',$ID)->delete();
        return redirect('/productslist')->with('error', 'Product Deleted Succesfully.');
    }

    public function deletegallery($ID)
    {
        $data=DB::table('gallery')->where('id',$ID)->delete();
        return redirect('/gallerylist')->with('error', 'Image Deleted Succesfully.');
    }

    public function deletebanner($ID)
    {
        $data=DB::table('banner')->where('id',$ID)->delete();
        return redirect('/bannerslist')->with('error', 'Banner Deleted Succesfully.');
    }

    public function deletedeal($ID)
    {
        $data=DB::table('products')->where('id',$ID)->delete();
        return redirect('/dealslist')->with('error', 'Deal Deleted Succesfully.');
    }

    public function deletebirthday($ID)
    {
        $data=DB::table('products')->where('id',$ID)->delete();
        return redirect('/birthdaylist')->with('error', 'Birthday Package Deleted Succesfully.');
    }

    public function deleteban($ID,$NAME)
    {
        if($NAME == 'home'){
            $data=DB::table('banner')
                    ->where('id',$ID)
                    ->update([
                        'homebanner' => NULL
                    ]);
        }elseif ($NAME == 'outdoor') {
            $data=DB::table('banner')
                    ->where('id',$ID)
                    ->update([
                        'outdoorbanner' => NULL
                    ]);
        }elseif ($NAME == 'groupprice') {
            $data=DB::table('banner')
                    ->where('id',$ID)
                    ->update([
                        'grouppricebanner' => NULL
                    ]);
        }elseif ($NAME == 'headertext') {
             $data=DB::table('banner')
                    ->where('id',$ID)
                    ->update([
                        'headertext' => NULL
                    ]);
        }elseif ($NAME == 'left_text') {
             $data=DB::table('banner')
                    ->where('id',$ID)
                    ->update([
                        'left_text' => NULL
                    ]);
        }elseif ($NAME == 'right_text') {
             $data=DB::table('banner')
                    ->where('id',$ID)
                    ->update([
                        'right_text' => NULL
                    ]);
        }else {
            $data=DB::table('banner')
                    ->where('id',$ID)
                    ->update([
                        'dealbanner' => NULL
                    ]);
        }
        return redirect('/bannerslist')->with('error', 'Banner Deleted Succesfully.');
    }

    public function deleteuser($ID)
    {
        $data=DB::table('users')->where('id',$ID)->delete();
        return redirect('/userslist')->with('error', 'User Deleted Succesfully.');
    }
    public function deletecustomer($ID)
    {
        $data=DB::table('customers')->where('id',$ID)->delete();
        return redirect('/customerslist')->with('error', 'User Deleted Succesfully.');
    }

    public function deletepromotion($ID)
    {
        $data=DB::table('promotion')->where('id',$ID)->delete();
        return redirect('/promotionslist')->with('error', 'Promotion Deleted Succesfully.');
    }

    public function deleteevent($ID)
    {
        $data=DB::table('specialevent')->where('id',$ID)->delete();
        return redirect('/eventslist')->with('error', 'Event Deleted Succesfully.');
    }

    public function deletesocialmedia($ID)
    {
        $data=DB::table('socialmedia')->where('id',$ID)->delete();
        return redirect('/socialmedialist')->with('error', 'Icon Deleted Succesfully.');
    }

    public function blog()
    {
        return view('main');
    }

    public function product()
    {
        return view('product');
    }

    public function promotion()
    {
        return view('addpromotion');
    }

    public function banner()
    {
        return view('addbanner');
    }

    public function deal()
    {
        return view('adddeal');
    }

    public function birthday()
    {
        return view('addbirthday');
    }

    public function user()
    {
        return view('adduser');
    }

    public function video()
    {
        return view('addvideo');
    }

    public function gallery()
    {
        return view('addgallery');
    }

    public function socialmedia()
    {
        return view('addsocialmedia');
    }

    public function seo()
    {
        return view('addseo');
    }

    public function event()
    {
        return view('addevent');
    }

    public function exhibition()
    {
        return view('addexhibition');
    }
    public function groupmedia()
    {
        return view('groupmedia');
    }

    public function orderslist()
    {
        $orders = DB::table('order')
                    ->join('customer','customer.id','order.user_id')
                    ->select('order.id','order.totalprice','order.pricewithgst','order.paymenttype','customer.fname','customer.lname','order.status','order.created_at','order.ordernumber')
                    ->orderBy('created_at','desc')
                    ->get();
        
        return view('orderslist')->with('orders',$orders);
    }

    public function blogslist()
    {
        $blogs = DB::table('blogs')->get();
        return view('blogslist')->with('blogs',$blogs);
    }

    public function productslist()
    {
        $products = DB::table('products')
                    ->where('isdeal','0')
                    ->get();
        return view('productslist')->with('products',$products);
    }

    public function userslist()
    {
        $users = DB::table('users')->get();
        return view('userslist')->with('users',$users);
    }


    public function promotionslist()
    {
        $promotions = DB::table('promotion')->get();
        return view('promotionslist')->with('promotions',$promotions);
    }

    public function dealslist()
    {
        $deals = DB::table('products')->where('isdeal','1')->get();
        return view('dealslist')->with('deals',$deals);
    }

    public function birthdaylist()
    {
        $birthday = DB::table('products')->where('isdeal','2')->get();
        return view('birthdaylist')->with('birthday',$birthday);
    }

    public function seolist()
    {
        $seo = DB::table('seo')->get();
        return view('seolist')->with('seo',$seo);
    }

    public function eventslist()
    {
        $events = DB::table('specialevent')->get();
        return view('eventslist')->with('events',$events);
    }

    public function exhibitionlist()
    {
        $exhibitions = DB::table('exhibition')->get();
        return view('exhibitionlist')->with('exhibitions',$exhibitions);
    }

    public function suggetionslist()
    {
        $suggetions = DB::table('suggetions')->get();
        return view('suggetionslist')->with('suggetions',$suggetions);
    }

    public function socialmedialist()
    {
        $socialmedias = DB::table('socialmedia')->get();
        return view('socialmedialist')->with('socialmedias',$socialmedias);
    }

    public function bannerslist()
    {
        $banners = DB::table('banner')->get();
        return view('bannerslist')->with('banners',$banners);
    }

    public function customerslist()
    {
        $users = DB::table('customers')->get();
        return view('customers.customerlist')->with('users',$users);
    }

	public function newlogin()
	{
		return view('newlogin');
	}
    //Group Registrations
    public function groupmedialist()
    {
        $data = GroupRegistration::latest()->where('group_text','!=', NULL)->get();
        return view('grouplists')->with('data',$data);
    }
    public function registergroup(Request $request)
    {
        if($request->hasFile('image')) { 
            $getimageName = time().'.'.$request->image->getClientOriginalExtension();
            $filepath = $request->image->move(storage_path('images'), $getimageName);
            $image = 'storage/images/'.$getimageName;
        } else{
            $image = null;
        }
        $insert = new GroupRegistration;
        $insert->group_text = $request->group_text;
        $insert->register_text = $request->register_text;
        $insert->image = $image;
        $insert->save();
        return redirect('/groupmedialist')->with('message', 'Group Text Added Succesfully.');
    }
    public function deletegroupmedia($ID)
    {
        $data=GroupRegistration::where('id',$ID)->delete();
        return redirect('/groupmedialist')->with('error', 'Group Deleted Succesfully.');
    }
    public function editgroupmedia($ID)
    {
        $data = GroupRegistration::where('id',$ID)->first();
        return view('editgroupmedia')->with('data',$data);
    }
    public function updategroupmedia(Request $request)
    {
        if($request->hasFile('image')){
            $getimageName = time().'.'.$request->image->getClientOriginalExtension();
            $filepath = $request->image->move(storage_path('images'), $getimageName);
            $image = 'storage/images/'.$getimageName;
        } 
        DB::table('group_registrations')
        ->where('id',$request->id)
        ->update([   
            'group_text' => $request->group_text,
            'register_text'   => $request->register_text,
            'image' => $image
        ]);
        return redirect('/groupmedialist')->with('message', 'Group Updated Succesfully.');
    }
    public function manageproducts()
    {
        return view('catalog.manageproducts');
    }
}