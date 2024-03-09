<x-header data='yes sir'>
    <x-slot:sub>hi im here</x-slot:sub>
    <x-slot:title>me too!</x-slot:title>
</x-header>
<html>
<form action='user' method='POST' style='background-color:rgb(233, 250, 250)'>
    @csrf
    <h2>insert new user</h2>
    <input type='text' name='uid' placeholder="uid" value={{old('uid')}}> <br><br>
    @error('uid')
        <span style="color: red">
            {{ $message }}
        </span><br>
    @enderror
    <input type='password' name='pwd' placeholder="pwd" value={{old('pwd')}}><br><br>
    @error('pwd')
        <span style="color: red"> {{ $message }}

        </span><br>
    @enderror
    <input type='text' name='email' placeholder="email" value={{old('email')}}><br><br>
    @error('email')
        <span style="color: red"> {{ $message }}
        </span><br>
    @enderror
    <button type='submit'>submit</button>
    @if (session('user'))
        <h2 style='color:green'>{{ session('user') }} added successfully </h2>
    @endif
</form>
<br> <br>
<table border="1">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>company(s)</th>
        <th>job(s)</th>
        <th>delete</th>
        <th>edit</th>
    </tr>
    @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>
                @foreach ($data->getCompany as $company)
                    {{ $company['company'] . ',' }}
                @endforeach
            </td>
            <td>
                @foreach ($data->getJob as $job)
                    {{ $job['job'] . ',' }}
                @endforeach
            </td>
            <td><a href={{ 'delete/' . $data->id }}>delete</a></td>
            <td><a href={{ 'edit/' . $data->id }}>edit</a></td>
        </tr>
    @endforeach

</table>
@if (session('edit'))
    <form action='update' method="POST" style="background-color: azure">
        {{ method_field('PUT') }}
        @csrf
        <h2>update userId {{ session('edit')->id }}</h2>
        <input type="hidden" name='id' value={{ session('edit')->id }}>
        <input type='text' name='uid' placeholder="uid" value={{ session('edit')->name }}> <br><br>
        <input type='text' name='email' placeholder="email" value={{ session('edit')->email }}> <br><br>
        <input type='password' name='pwd' placeholder="pwd" value={{ session('edit')->pwd }}> <br><br>
        <button type='submit'>submit</button>
    </form>
@endif

@if (session('delete'))
    <span style='color:green'> userId {{ session('delete') }} successfully removed</span>
@endif

@if (session('update'))
    <span style='color:green'> userId {{ session('update') }} successfully updated</span>
@endif


<x-footer></x-footer>
</html>
