@extends('dashboard.layouts.main')
@section('container')
<div class="row">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-person-fill"></i>{{ auth()->user()->name }}</h6>
    </div>
    <div class="col-lg-11">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="alldata">
                @if($users->count())
                    @foreach($users as $user )
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                <a href="/admin/{{ $user->id }}" class="btn btn-warning btn-sm"><i
                                        class="bi bi-eye"></i></a>
                                <form action="/admin/{{ $user->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin Ingin Hapus')"><i
                                            class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="4">
                            <p class="text-center fs-5">Belum Ada Distributor</p>
                        </td>
                    </tr>
                    @endif
                </tbody>
                <tbody id="content" class="searchdata"></tbody>
            </table>
    </div>
</div>
{{ $users->links() }}
<script>
    $(document).ready(function(){
$("#search").keyup(function(){
    $value=$(this).val() 
    if($value){
        $('.alldata').hide();
        $('.searchdata').show();
    }else{
        $('.alldata').show();
        $('.searchdata').hide();
    }
    $.ajax({
type:'get',
url:'{{URL::to('cari')}}',
data:{'cari':$value},
success:function(data){
    console.log(data);
    $('#content').html(data)
}
    });
});

    });
</script>
@endsection
