<?php

namespace App\Livewire\Exam;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Exam as ModelExam;

#[Title('مشاهده ی جزئیات آزمون')]

class Exam extends Component
{

    public $exam;
    public $comment_text = "";
    public $new_comment = "";//کامنت جدیدی که هنوز تایید نشده است.
    public $new_comment_class = 'd-none';//کلاس مربوط به کامنت جدید تایید نشده


    public function mount($id)
    {
        $this->exam = ModelExam::find($id);
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        $this->dispatch('showAlert', [
            'title' => 'موفقیت آمیز',
            'message' => 'نظر با موفقیت حذف شد',
            'icon'=>'info'
        ]);
    }
    
    public function addComment(){
        $this->validate([
            'comment_text'=>'required |min:5|max:2000'
        ]);

        $comment = new Comment;
        $comment->text = $this->comment_text ;
        $comment->user_id = Auth::user()->id;
        $comment->exam_id = $this->exam->id;
        $comment->save();

        $this->new_comment_class = "";
        $this->new_comment = $this->comment_text;

        $this->comment_text = "";

        $this->dispatch('showAlert', [
            'title' => 'موفقیت آمیز',
            'message' => 'نظر با موفقیت در پایگاه داده ثبت شد',
            'icon'=>'success'
        ]);

    }


    public $isAnswer = 0 ;
    public $commentToAnswer ;//آیدی کامنتی که قرار است پاسخ برای آن ثبت شود.
    public function getCommentToAnswer($comment)
    {
        $this->commentToAnswer = $comment;
        $this->isAnswer = 1;
    }

    public function addAnswer(){
        $this->validate([
            'comment_text'=>'required |min:5'
        ]);
        $comment = new Comment;
        $comment->text = $this->comment_text ;
        $comment->user_id = Auth::user()->id;
        $comment->exam_id = $this->exam->id;
        $comment->parent_id = $this->commentToAnswer['id'];
        $comment->save();

        $this->new_comment_class = "";
        $this->new_comment = $this->comment_text;

        $this->comment_text = "";

        $this->dispatch('showAlert', [
            'title' => 'موفقیت آمیز',
            'message' => 'پاسخ با موفقیت ثبت شد',
            'icon'=>'success'
        ]);

        $this->canselAnswer();
    }

    public function canselAnswer()
    {
        $this->reset('isAnswer','commentToAnswer');
    }

    public function render()
    {
        $comments = Comment::query()->where([
            ['exam_id','=', $this->exam->id],
            ['is_active','=',1],
            ['parent_id','=',NULL]
        ])->orderBy('created_at','desc')->get();
        return view('livewire.exam.exam',['comments' => $comments]);
    }
}
