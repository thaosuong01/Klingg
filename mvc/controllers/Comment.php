<?php
class Comment extends Controller
{
    private $per_page = 5;
    private $offset = 0;
    private $comments;

    function __construct()
    {
        $this->comments = $this->model('ModelComment');
        $this->users = $this->model('ModelUser');
        $this->products = $this->model('ModelProduct');
    }
    function list_comment()
    {
        $keyword = '';

        if (isset($_GET['search']) && ($_GET['search'] != '') || !empty($_GET['keyword_comment'])) {
            if (!empty($_GET['keyword_comment'])) {
                $keyword =  $_GET['keyword_comment'];
            }
            // $_GET['search'] = '';
        }


        $countComment = count($this->comments->getComments($keyword));


        $maxPage = ceil($countComment / $this->per_page);

        if (!empty($_GET['page'])) {
            $page = $_GET['page'];
            if ($page < 1 || $page > $maxPage) {
                $page = 1;
            }
        } else {
            $page = 1;
        }

        $this->offset = ($page - 1) * $this->per_page;
        $getComments = $this->comments->getComments($keyword);

        $comments = $this->comments->getAllCom($keyword, $this->per_page, $this->offset);

    

        // $getComment = $this->comments->getAllComment();
        // $sumStar = 0;
        // if (!empty($getComment)) {
        //     foreach ($getComment as $comment) {
        //         $sumStar += $comment['rating'];
        //     }
        // }


        // $avgStar = number_format((float)$sumStar / count($getComment), 1);
        return $this->view('admin', [
            'page' => 'comment/list',
            'js' => ['ajax', 'search','start_admin'],
            'comments' => $comments,
            'getComments' => $getComments,
            'title' => 'Comment',
            'bg' => 'active',
            'pageactive' => 'comment',
            'maxPage' => $maxPage,
            'pageNum' => $page,
            // 'avgStar' => $avgStar
        ]);
    }

    function delete_comment($id) {
        $status = $this->comments->deleteComment($id);
        if ($status) echo -1;
        else echo -2;
    }
}
