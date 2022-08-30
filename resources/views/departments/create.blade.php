@extends('layouts.main')

@section('nav-button')
    <div class="container d-flex justify-content-start ">
        <a class="btn btn-light mx-2" href="/">Back to Main</a>
    </div>
@endsection
@section('page-title')
    <h3>New Department</h3>
@endsection

@section('content')
    <!-- Show Error Messages -->
    <div class="col-6 mx-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <form>
        @csrf
        <div class="col-6 mx-auto">
            <span class="text-success" id="nameSc"></span>
            <div class="mb-3">
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                <span class="text-danger" id="name_error"></span>
            </div>
            <div class="mb-3">
                <Button type="submit" class="form-control btn btn-primary" id="btn-submit" name="submit">SUBMIT</Button>
            </div>
        </div>
    </form>

    <script type="text/javascript">

        $(document).ready(function() {

            $("#btn-submit").click(function(e){

                e.preventDefault();

                let _token = $("input[name='_token']").val();
                let name = $("input[name=name]").val();

                $.ajax({

                    url: "{{route('departments.store')}}",
                    type:'POST',
                    data: {_token:_token,name:name},
                    //dataType: 'json',
                     //contentType: false,

                    success: function(response) {
                        if(response) {
                            $('#nameSc').text(response.success);
                        }
                    }, 
                    error: function(reject) {
                     
                            var errors = $.parseJSON(reject.responseText);

                            $.each(errors.errors, function (key, val) {
                               
                        $("#" + key + "_error").text(val[0]);

                    });
                    }
                    
                });

            }); 


            function printErrorMsg (msg) {

                $.each( msg, function( key, value ) {
                    console.log(key);
                    $('.'+key+'_err').text(value);

                });

            }

        });

    </script>

@endsection
