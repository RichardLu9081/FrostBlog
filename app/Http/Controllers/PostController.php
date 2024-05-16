<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /*
     * 文章列表
     */
    public function removeImagesFromContent($content)
{
    return preg_replace('/<img[^>]*>/i', '', $content);
}

    public function index()
    {
        // $user = \Auth::user();
        $posts = Post::orderBy('created_at', 'desc')->paginate(6);
        
        

        return view('post/index', compact('posts'));
    }
    public function show(Post $post)
    {

        return view('post/show', compact('post'));
    }

    public function PostList()
    {
        // 查询
        $records = Post::orderBy('id', 'DESC')
            ->paginate(10);
        // 渲染模板并传递数据
        return view('admin/post/PostList')->with("records", $records);;
    }
    public function destroy($id)
    {
        // 获取文章实例
        $post = Post::findOrFail($id); // 确保文章存在
    
        // 解析 content 字段，提取图片路径（假设路径是 /storage/ 开头的相对路径）
        preg_match_all('/<img[^>]*src\s*=\s*["\']([^"\']+)/i', $post->content, $matches);
        $imagePaths = array_map(function($match) {
            // 提取 src 属性值，去除引号
            $srcValue = trim($match, "\"'");
           
            // 使用 basename 提取文件名
            $fileName = basename($srcValue);
            //dd($fileName);
            return $fileName;
        }, $matches[1]);
       
        // 删除文章记录
        $post->delete();
    
        // 删除所有图片
        foreach ($imagePaths as $fileName) {
            // 注意：这里需要根据实际路径调整，因为现在我们处理的是文件名而非完整路径
            // 示例中假设图片都存储在 'storage/app/public/images/' 目录下
            $pathToDelete =  'public/images/'.$fileName;
          //  dd($pathToDelete); Storage:: disk('public')->exists($pathToDelete)这样也可以
          if (Storage::exists($pathToDelete)) {
               //dd('ok');
                Storage::delete($pathToDelete);
                // 返回之前页面并闪出提示信息
                
            }
        }
        return \Redirect::back()->with("success", "文章及其关联图片已成功删除！");
        
    }
    
    /*
     * 编辑
     * @param $id
     */
    public function edit($id)
    {
        // 查询指定 id 的数据库记录
        $record = Post::find($id);
        // 渲染模板并传递入数据
        return view("admin/post/PostEdit")->with("record", $record);
    }

    public function EditSubmit(Request $request, $id)
    {

        // 验证规则
        $rules = [
            'title' => 'required|max:255|min:2',
            'content' => 'required|min:10',
        ];

        // 自定义错误消息（可选）
        $messages = [
            'title.required' => '标题不能为空',
            'content.required' => '内容不能为空',
        ];

        // 创建验证器实例
        $validator = Validator::make($request->all(), $rules, $messages);

        // 如果验证失败
        if ($validator->fails()) {
            // 闪存旧输入和错误信息到session中以便重定向后获取
            Session::flashInput($request->input());
            return redirect()->back()->withErrors($validator);
        }
        // 验证通过后的逻辑...     
        //dd($request->input());

        $post = Post::findOrFail($id);

        $post->fill($request->input());
        $post->save();

        // 更新成功，返回相应的响应
        return redirect()
            ->route('post.list')
            ->with('success', '信息已成功更新。');
    }

    public function add()
    {
       // return view('admin/post/PostAdd');
        return view('admin/post/PostAdd');
    }
    public function AddSubmit(Request $request)
    {
       
        $this->validate($request, [
            'title' => 'required|max:255|min:2',
            'content' => 'required|min:10',
        ]);
        $params = array_merge(request(['title', 'content']), ['user_id' => \Auth::id()]);
        Post::create($params);
        return redirect()
            ->route('post.list')
            ->with('success', '信息已成功更新。');
    }
    public function imageUpload(Request $request)
    {
        //dd(request()->all());
        // 获取上传的文件
        $file = $request->file('image');
       // dd($file);
        // 生成随机或指定的文件名
        $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();

        // 使用Laravel的Storage facade存储到指定位置，例如：public/images
        $path = Storage::disk('public')->putFileAs('images', $file, $filename);

        // 返回存储成功的图片路径（）
        $url = Storage::url($path);


        // 返回 JSON 格式的响应，符合 WangEditor 的要求
        return response()->json([
            'errno' => 0,
            'data' => [
                [
                    'url' => $url,
                ],
            ],
        ]);
       // $path = $request->file('wangEditorH5File')->storePublicly(md5(\Auth::id() . time()));
        //return asset('storage/'. $path);
    }
    public function select2()
    {
        return view('select-2');
    }

    public function index13种方法查询数据库(){
        //1.原生SQL
        /* $user=DB::select('select * from laravel_users');
        return $user; */


        //2.查询构造器
   /*       $user=DB::table('laravel_users')->find(19);
         return Response()->json($user); */

         //3.模型ORM
       /*   $user= User::all();
         return $user; */

        //  $user=DB::table('users')->first();
        //  return Response()->json($user); 
        
        $user = User::get();

       return [$user];

       
    }
   
}
