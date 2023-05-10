<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th,
    table td {
        padding: 10px;
        border: 1px solid #000;
    }
</style>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Academic Number</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($students as $key => $student)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->AcademicNumber }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
