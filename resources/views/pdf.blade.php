<!-- pdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <div>
        <div class="card">
            <div class="card-header">
            <span class="d-flex justify-content-left"> <strong>JOF ORDER</strong></span>
            </div>
        </div>
    </div>



    {{-- DATA TABLE --}}
        <table class="table">
                <thead>
                  <tr>
                    <th scope="col">JOF#</th>
                    <th scope="col">Kind Of Order</th>
                    <th scope="col">Kind of Ring</th>
                    <th scope="col">Date Prepared</th>
                  <th scope="col">Due Date</th>
                  </tr>
                </thead>
                <tbody>
                        @foreach($joforder as $jof)
                        <tr>
                            <td>
                                {{$jof->jofno}}
                            </td>
                            <td>
                            {{$jof->kind_of_order}}
                            </td>
                            <td>
                                {{$jof->kind_of_ring}}
                            </td>
                            <td>
                                {{$jof->date_prepared}}
                            </td>
                            <td class="text-danger">
                                   <strong> {{$jof->due_date}} </strong>
                            </td>
                        </tr>
                    @endforeach   
                </tbody>
              </table>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
