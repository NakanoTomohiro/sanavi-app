   @extends('layouts.app')

   @section('title', 'サウナ施設詳細')

   @section('content')
       <div class="form-group col-12">
           <div class="d-grid gap-2">
               <a href="{{ url($place->id . '/post') }}" class="btn btn-outline-secondary btn-lg">
                   <i class=""></i>　サ活投稿
               </a>
           </div>
       </div>
       <div class="form-group col-12">
           <div class="input-group mb-4">
               <div class="input-group-prepend">
                   <div class="input-group-text"><i class="fa fa-book"></i>　施設名</div>
               </div>
               <input disabled class="form-control bg-light" style="font-size:16px" value="{{ $place->place_name }}">
           </div>
       </div>
       <div class="form-group col-12">
           <div class="input-group mb-4">
               <div class="input-group-prepend">
                   <div class="input-group-text"><i class="fa fa-sort-numeric-asc"></i>　温度</div>
               </div>
               <input disabled class="form-control bg-light" style="font-size:16px" value="{{ $place->room_temp }}℃">
           </div>
       </div>
       <div class="form-group col-12">
           <div class="input-group mb-4">
               <div class="input-group-prepend">
                   <div class="input-group-text"><i class="fa fa-sort-numeric-asc"></i>　水温</div>
               </div>
               <input disabled class="form-control bg-light" style="font-size:16px" value="{{ $place->water_temp }}℃">
           </div>
       </div>
       <div class="form-group col-12">
           <div class="input-group mb-4">
               <div class="input-group-prepend">
                   <div class="input-group-text"><i class="fa fa-money"></i>　料　金</div>
               </div>
               <input disabled class="form-control bg-light" style="font-size:16px"
                   value="{{ number_format($place->price) }}円">
           </div>
       </div>
       <div class="form-group col-12">
           <div class="input-group mb-4">
               <div class="input-group-prepend">
                   <div class="input-group-text"><i class="fa fa-calendar-o"></i>　総合評価</div>
               </div>
               <input disabled class="form-control bg-light" style="font-size:16px" value="{{ '' }}">
           </div>
       </div>
       <div class="form-group col-12">
           <div class="input-group mb-4">
               <div class="input-group-prepend">
                   <div class="input-group-text"><i class="fa fa-calendar-o"></i>　ととのい度</div>
               </div>
               <input disabled class="form-control bg-light" style="font-size:16px" value="{{ '' }}">
           </div>
       </div>
       <div class="form-group col-12">
           <div class="input-group mb-4">
               <div class="input-group-prepend">
                   <div class="input-group-text"><i class="fa fa-calendar-o"></i>　温度評価</div>
               </div>
               <input disabled class="form-control bg-light" style="font-size:16px" value="{{ '' }}">
           </div>
       </div>
       <div class="form-group col-12">
           <div class="input-group mb-4">
               <div class="input-group-prepend">
                   <div class="input-group-text"><i class="fa fa-calendar-o"></i>　水温評価</div>
               </div>
               <input disabled class="form-control bg-light" style="font-size:16px" value="{{ '' }}">
           </div>
       </div>
       <div class="form-group col-12">
           <div class="input-group mb-4">
               <div class="input-group-prepend">
                   <div class="input-group-text"><i class="fa fa-calendar-o"></i>　外気浴（休憩）評価</div>
               </div>
               <input disabled class="form-control bg-light" style="font-size:16px" value="{{ '' }}">
           </div>
       </div>
       <div class="form-group col-12">
           <div class="input-group mb-4">
               <div class="input-group-prepend">
                   <div class="input-group-text"><i class="fa fa-calendar-o"></i>　混雑度</div>
               </div>
               <input disabled class="form-control bg-light" style="font-size:16px" value="{{ '' }}">
           </div>
       </div>
       <div class="form-group col-12">
           <div class="input-group mb-4">
               <div class="input-group-prepend">
                   <div class="input-group-text"><i class="fa fa-calendar-o"></i>　住所</div>
               </div>
               <input disabled class="form-control bg-light" style="font-size:16px" value="{{ $place->address }}">
           </div>
       </div>

       {{-- サ活投稿一覧表示 --}}
       <h2 class="text-center">{{ $place->place_name }}　サ活投稿一覧</h2>
       <table class="table table-bordered table-striped task-table table-hover">
           <thead class="thead-dark">
               <tr>
                   <th>ユーザー名</th>
                   <th>総合評価</th>
                   <th>ととのい度</th>
                   <th>室温評価</th>
                   <th>水温評価</th>
                   <th>外気浴（休憩）評価</th>
                   <th>訪問日</th>
                   <th>感想</th>
                   <th>編集</th>
                   <th>削除</th>
               </tr>

               @foreach ($posts as $post)
                   <tr>
                       <td>{{ $post->user_name }}</td>
                       <td>{{ $post->all_score }}点</td>
                       <td>{{ $post->rt_score }}点</td>
                       <td>{{ $post->wt_score }}点</td>
                       <td>{{ $post->rest_score }}点</td>
                       <td>{{ $post->cong_score }}点</td>
                       <td>{{ $post->visit_date }}</td>
                       <td>{{ $post->comment }}</td>
                       <td>
                           <form action="{{ url($post->id . '/place_edit') }}" method="get">
                               {{ csrf_field() }}
                               <button type="submit" class="btn btn-secondary">
                                   <i class="fa fa-pencil"></i> 編集
                               </button>
                           </form>
                       </td>
                       <td>
                           <form action="{{ url('/place_list/' . $post->id . '/detail') }}" method="post">
                               {{ csrf_field() }}
                               {{ method_field('DELETE') }}
                               <button type="submit" class="btn btn-secondary">
                                   <i class="fa fa-trash"></i> 削除
                               </button>
                           </form>
                       </td>
                   </tr>
               @endforeach
               </tbody>
           <tfoot>
               <tr>
                   <td colspan="7" class="bg-light pb-0">
                       {{ $posts->links() }}
                   </td>
               </tr>
           </tfoot>
       </table>

       <div class="form-group col-12">
           <div class="d-grid gap-2">
               <a href="{{ url('/place_list') }}" class="btn btn-outline-secondary btn-lg">
                   <i class="fa fa-mail-reply"></i>　一覧に戻る
               </a>
           </div>
       </div>


   @endsection
