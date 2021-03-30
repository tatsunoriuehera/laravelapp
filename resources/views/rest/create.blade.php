<form class="" action="/laravelapp/public/rest" method="post">
  {{csrf_field()}}
  <input type="text" name="message" value="{{old('message')}}">
  <input type="text" name="url" value="{{old('url')}}">
  <input type="submit" value="send">
</form>
