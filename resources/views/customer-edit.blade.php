<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1e291dc247.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style/style.css">
    <title>Updation Form</title>
</head>
<body>
    <div class="container">
    <div class="m-3">
        <div class="m-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('form/show') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
          </nav>
        </div>
    </div>
    <div class="container">
    <div class="row ">
      <div class="col-lg-7 mx-auto">
        <div class="card mx-auto bg-light">
            <div class="card-body bg-light">
                <div class = "container">
                    <h1 class="text-center">Updation Form</h1>
                    <form id="contact-form" action="{{ route('form.update', ['form' => $customer->customer_Id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" onchange="previewFile()"/>
                                <label for="imageUpload"><i class="fa-solid fa-pencil m-2"></i></label>
                            </div>
                            <div class="avatar-preview">
                                <img id="imagePreview" src="/public/image/{{$customer->image}}">
                            </div>
                            <span class="text-danger">
                                @error('image')
                                *{{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="controls">
                            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_name">Name <span class="text-danger">*</span></label>
                            <input id="form_name" type="text" name="name" value="{{$customer->name}}" class="form-control" placeholder="Please enter your name *">
                            <span class="text-danger">
                                @error('name')
                                *{{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_lastname">Date of Birth <span class="text-danger">*</span></label>
                            <input id="form_lastname" type="date" name="dob" value="{{$customer->dob}}" class="form-control" placeholder="">
                            <span class="text-danger">
                                @error('dob')
                                <span class="text-danger">*</span>{{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email">Email <span class="text-danger">*</span></label>
                            <input id="form_email" type="email" name="email" value="{{$customer->email}}" class="form-control" placeholder="Please enter your email *" >
                            <span class="text-danger">
                                @error('email')
                                *{{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tel">Phone No <span class="text-danger">*</span></label>
                            <input id="form_email" type="tel" name="phnno" maxlength="10"value="{{$customer->phnno}}" class="form-control" placeholder="Please enter your phone no *" >
                            <span class="text-danger">
                                @error('phnno')
                                *{{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email">Gender <span class="text-danger">*</span></label>
                            <div class="d-flex">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="gender" value="F" @if(($customer->gender) == "F") checked @endif label="Female">
                                    <label for="female" class="form-check-label">Female</label>
                                </div>
                                <div class="form-check mx-5">
                                    <input type="radio" class="form-check-input" name="gender" value="M" @if(($customer->gender) == "M") checked @endif label="Male">
                                    <label for="male" class="form-check-label">Male</label>
                                </div>
                            </div>
                            <span class="text-danger">
                                @error('gender')
                                *{{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_need">City <span class="text-danger">*</span></label>
                            @php 
                            $Gujarat = [
                         'Ahmedabad','Amreli district','Anand','Banaskantha','Bharuch','Bhavnagar','Dahod','The Dangs','Gandhinagar','Jamnagar','Junagadh','Kutch','Kheda','Mehsana','Narmada','Navsari','Patan','Panchmahal','Porbandar','Rajkot','Sabarkantha','Surendranagar','Surat','Vyara','Vadodara','Valsad',];
                          @endphp
                            <select id="form_need" name="city" class="form-control">
                                <option value="" selected disabled>--Select Your City--</option>
                                @foreach($Gujarat as $key=>$value)
                                <option value={{$value}} {{ ($customer->city == $value) ? "selected" : "" }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('city')
                                *{{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="languages">Programming Languages Known <span class="text-danger">*</span></label>
                               <input type="checkbox" name="languages[]" class="" {{ in_array('Java', json_decode($customer->languages)) ? 'checked': '' }}  value="Java"> Java
                               <input type="checkbox" name="languages[]" class="" {{ in_array('C++', json_decode($customer->languages)) ? 'checked': '' }}  value="C++"> C++
                               <input type="checkbox" name="languages[]" class="" {{ in_array('Python', json_decode($customer->languages)) ? 'checked': '' }}  value="Python"> Python
                               <input type="checkbox" name="languages[]" class="" {{ in_array('Javascript', json_decode($customer->languages)) ? 'checked': '' }}  value="Javascript"> Javascript
                               <span class="text-danger">
                                @error('languages')
                                *{{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-success btn-send  pt-2 btn-block" name="submit" value="Update" >
                    </div>
                </div>
            </div>
         </form>
        </div>
    </div>
</div>
        <!-- /.8 --></div>
    <!-- /.row-->

</div>
</div>
    </div>
<script>
    function previewFile() {
  var preview = document.querySelector('img');
  var file = document.querySelector('input[type=file]').files[0];
  var reader = new FileReader();

  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
 }
</script>
</body>
</html>