<form method="post" action=" {{ route('cities.update', $city->id) }} ">
    @csrf
    <input type="text" name = "id" value="{{ $city->id }}" >
    <input type="text" name = "name" value="{{ $city->name }}" >
    <input type="submit" value="submit">
</form>