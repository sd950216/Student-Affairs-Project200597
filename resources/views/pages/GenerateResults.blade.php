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
        text-align: center;

    }

</style>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Department</th>
        <th>Academic Number</th>
        <th>status</th>

    </tr>
    </thead>
    <tbody>
    @foreach ($students as $key => $student)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->Department }}</td>
            <td>{{ $student->AcademicNumber }}</td>
            <td>{{ $student->status }}</td>

        </tr>
    @endforeach
    </tbody>
</table>
