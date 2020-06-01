        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>会社名</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($campanies as $campany)
                <tr>
                    <td>{!! link_to_route('campanies.show', $campany->id, ['id' => $campany->id]) !!}</td>
                    <td>{{ $campany->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $campanies->links('pagination::bootstrap-4') }}
    
    
   

