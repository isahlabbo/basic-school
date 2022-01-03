
<table class="table-bordered" style="width: 100%; height: 20px;">
    <thead class="text text-center">
        <tr>
            <th>AFFECTIVE TRAITS</th>
            <th>RATING</th>
        </tr>
    </thead>
    <tbody>
    @foreach($sectionClassStudentTerm->sectionClassStudentTermAccessment->sectionClassStudentTermAccessmentAffectiveTraits as $accessmentTrait)    
    <tr>
        <td>{{$accessmentTrait->affectiveTrait->name}}</td>
        <td>{{$accessmentTrait->value}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
