@extends('layouts.main')

@section('nav-button')
    <div class="container d-flex justify-content-start ">
        <a class="btn btn-light mx-2" href="/">Back to Main</a>
    </div>
@endsection
@section('page-title')
    <h3>New Author</h3>
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

    <form action="{{route('authors.store')}}" method="post" id="authorForm">
        @csrf
        <div class="col-6 mx-auto">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="country" id="country" placeholder="Enter Country">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="email" id="email" placeholder="email">
            </div>
            <div class="mb-3">
                <Button type="submit" class="form-control btn btn-primary" name="submit">SUBMIT</Button>
            </div>
        </div>
    </form>
    <script>
        (function() {
            document.querySelector('#authorForm').addEventListener('submit',function(e) {
                e.preventDefault();

                axios.post(this.action, {
                        'name': document.querySelector('#name').value,
                        'country': document.querySelector('#country').value,
                        'email': document.querySelector('#email').value,
                })
                .then((responce) =>{
                    window.location.href = '{{ route('authors.index') }}'
                    
                })
                .catch((error) =>{
                    const errors = error.response.data.errors // get all errors
                    const firstItem = Object.keys(errors)[0] // get the key of first item have error
                    const firstItemDOM = document.getElementById(firstItem) // get the item
                    const firstErrorMessage = errors[firstItem][0] // get the error message of the item

                    
                    // scroll to the error message
                    firstItemDOM.scrollIntoView()

                    clearErrors()

                    // show the error message
                    firstItemDOM.insertAdjacentHTML('afterend', `<div class="text-danger">${firstErrorMessage}</div>`)
                    
                    // highlight the form control with the error
                    firstItemDOM.classList.add('border', 'border-danger')
                });
            });

            function clearErrors() {
                // remove all error messages
                const errorMessages = document.querySelectorAll('.text-danger')
                errorMessages.forEach((element) => element.textContent = '')
                
                // remove all form controls with highlighted error text box
                const formControls = document.querySelectorAll('.form-control')
                formControls.forEach((element) => element.classList.remove('border', 'border-danger'))
            }
        })();
    </script>
@endsection

