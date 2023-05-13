@extends("layouts.app")
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Subject </div>

                    <div class="card-body">
                        @if(count($subjects) == 0)
                            No more available courses to add
                        @else
                <form method="POST" action="{{ route('storeStudentSubject') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" style="margin-top: 5px;">Choose a subject:</label>
                        <select id="name" name="name" style="padding: 4px;
  border-radius: 4px;
  border: 1px solid #ccc;
  font-size: 16px;">
                            @foreach($subjects as $subject)

                            <option value="{{$subject->name}}" style="padding: 8px;
  font-size: 16px;">{{$subject->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

