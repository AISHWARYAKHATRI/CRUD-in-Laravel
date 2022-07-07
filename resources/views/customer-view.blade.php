<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1e291dc247.js" crossorigin="anonymous"></script>
    <title>View</title>
</head>
<body>
  <div class="container">
    <div class="m-3">
      <div class="m-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
          </nav>
  <div class="mb-5"><a href="{{ route('form.create') }}" class="btn mt-1 btn-primary">Add New Record</a></div>
  @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{ session()->get('message') }}</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        
    <table class="table table-striped table-light">
        <thead>
          <tr>
            <th scope="col">Sr no.</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">City</th>
            <th scope="col">Phone No.</th>
            <th scope="col">DOB</th>
            <th scope="col">Languages</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
          <tr>
            <th scope="row">{{ $customer->customer_Id }}</th>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->gender }}</td>
            <td>{{ $customer->city }}</td>
            <td>{{ $customer->phnno }}</td>
            <td style="white-space:nowrap">{{ $customer->dob }}</td>
            <td>
            @for($i=0; $i<count(json_decode($customer->languages)); $i++)
            
                {{ json_decode($customer->languages)[$i]}}
            @endfor
        </td>
            <td><img src = "{{ url('public/Image/'.$customer->image) }}" alt="" style="width: 100px; height: 100px; border-radius: 20px"></td>
            <td>
              <div class="d-flex justify-content-between">
              <a href = "{{ route('customer.profile', ['id' => $customer->customer_Id]) }}"><i class="fa-solid fa-eye"></i></a>
              <a href = "{{ route('form.edit', ['form' => $customer->customer_Id]) }} "><i class="fa-solid fa-pencil"></i></a>
              <a href = "{{ route('customer.delete', ['id' => $customer->customer_Id]) }}" onclick="return confirm('Are you sure you want to delete?')"><i class="fa-solid fa-trash-can"></i></a>
            </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    
    </div>
  </div>
</div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>