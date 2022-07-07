<!doctype html>
<html lang="en">
  <head>
    <title>Registration Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/style/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <div class="m-3">
      <div class="m-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                      <h1 class="text-center">User Profile</h1>
                          <div class="avatar-upload">
                              <div class="avatar-edit">
                                  <label for="imageUpload"><i class="fa-solid fa-pencil m-2"></i></label>
                              </div>
                              <div class="avatar-preview">
                                  <img id="imagePreview" src="/public/image/{{$customer->image}}">
                              </div>
                          </div>
                          <div class="col-12 bg-white px-3  pb-3">
                            <div class="d-flex align-items-center justify-content-between border-bottom">
                                <p class="py-2">Name</p>
                                <p class="py-2 text-muted">{{$customer->name}}</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between border-bottom">
                                <p class="py-2">Email</p>
                                <p class="py-2 text-muted">{{$customer->email}}</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between border-bottom">
                                <p class="py-2">Languages Known</p>
                                <p class="py-2 text-muted">
                                    @for($i=0; $i<count(json_decode($customer->languages)); $i++)
                                    {{json_decode($customer->languages)[$i]}}
                                    @endfor
                                </p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between border-bottom">
                                <p class="py-2">Date of Birth</p>
                                <p class="py-2 text-muted">{{$customer->dob}}</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between border-bottom">
                                <p class="py-2">Mobile</p>
                                <p class="py-2 text-muted">{{$customer->phnno}}</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="py-2">City</p>
                                <p class="py-2 text-muted">{{$customer->city}}</p>
                            </div>
                        </div>
                    </div>
                </body>
            </html>