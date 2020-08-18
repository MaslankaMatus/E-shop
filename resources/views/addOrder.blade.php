@include('error')
<div class="col-2"></div>

<div class="col-8">
    <form action="/orders" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1">
            {{--        <small id="name" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
        </div>
        <div class="form-group">
            <label for="desciption">Description</label>
            <input type="text" name="description" class="form-control" id="desciption">
        </div>

        {{--        <div class="form-group">--}}
        {{--            <label for="file">File Url</label>--}}
        {{--            <input type="text" name="file" class="form-control" id="file">--}}
        {{--        </div>--}}

        <div class="form-group">
            <label for="file">Upload file</label>
            <input type="file" name="files" class="" id="file">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

        {{--    <input type="hidden" name="order_id" value="{{ $order->id }}">--}}
        {{--    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">--}}
    </form>
</div>

<div class="col-2"></div>
