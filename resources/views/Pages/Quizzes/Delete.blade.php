<!-- Deleted inFormation Student -->
<div class="modal fade" id="delete_quizze{{$quizze->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('Students_trans.Deleted_Student')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('quizzes.destroy','test')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <p> {{ trans('My_Classes_trans.Warning_Grade') }} {{$quizze->Name}}</p>
                    <input type="hidden" name="id" value="{{$quizze->id}}">
                    <h5 style="font-family: 'Cairo', sans-serif;"></h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Students_trans.Close')}}</button>
                        <button  class="btn btn-danger">{{trans('Students_trans.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
