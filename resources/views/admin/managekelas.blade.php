@extends('template.layout')
@section('title','Manage Kelas')
@section('kelas','active-nav-item')
@section('content')
<style>
    .w-5{
        display: none;
    }
    div span .relative{
        display: none;
    }
    div p {
        display: none;
    }
</style>
<div class="row">
    <div class="col-sm-6">
        <form action="">
            <div class="row">
                <div class="col-sm-10">
                    <input type="number" value="{{$_GET['jumlah'] ?? '' }}" min="2" max="6" name="jumlah" class="form-control" id="jumlah" required="" step="">        
                </div>
                <div class="col-sm-2">
                    <button type="submit" id="jml" class="btn btn-success">Submit</button>
                </div>
            </div>
       </form>
    </div>

   @if(isset($_GET['jumlah']))
        <form action="">
            <div class="row">
                <div class="col-sm-6">
                    @for($i = 0; $i < $_GET['jumlah'];$i++)
                    <input class="form-control" type="text" name="">
                    @endfor
                </div>
            </div>
        </form>
    @endif

    <div class="col-sm-6">
        <table class="table">
            <thead>
              <tr>
                <th><input type="checkbox" name="checkall" id="checkall"></th>
                <th scope="col">Kelas_id</th>
                <th scope="col">Kelas</th>
              </tr>
            </thead>
            <tbody>
                @foreach($kelas as $data)
              <tr>
                  <th><input type="checkbox" class="cekkelas" name="cekkelas"></th>
                <th scope="row">{{ $data->id }}</th>
                <td>{{ $data->kelas }}</td>
                <td>
                </td>
            </tr>
              @endforeach
            </tbody>
          </table>
          {{ $kelas->links() }}
    </div>
</div>
<script>

   $(function(e){
        $("#checkall").click(function (e) { 
            $('.cekkelas').prop('checked',$(this).prop('checked'));
                    
            });
   })
</script>

@endsection