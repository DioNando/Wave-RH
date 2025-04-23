@props(['headers' => [], 'align' => 'text-left'])

<thead class="bg-blue-200 dark:bg-blue-800">
    <tr>
        @foreach ($headers as $header)
            <th scope="col" class="uppercase px-5 py-3.5 {{ $align }} text-xs font-semibold text-blue-900 dark:text-gray-300 ">
                {{ $header }}
            </th>
        @endforeach
    </tr>
</thead>
