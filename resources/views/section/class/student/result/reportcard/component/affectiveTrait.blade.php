
<table class="table-bordered" style="width: 100%; height: 20px;">
    <thead class="text text-center">
        <tr>
            <th>AFFECTIVE TRAITS</th>
            <th>RATING</th>
        </tr>
    </thead>
    <tbody>
    @if($sectionClassStudentTerm->sectionClassStudentTermAccessment)
    @foreach($sectionClassStudentTerm->sectionClassStudentTermAccessment->sectionClassStudentTermAccessmentAffectiveTraits as $accessmentTrait)    
    <tr>
        <td>{{$accessmentTrait->affectiveTrait->name ?? 0}}</td>
        <td>{{$accessmentTrait->value ?? 0}}</td>
    </tr>
    @endforeach
    @endif
    </tbody>
</table>
