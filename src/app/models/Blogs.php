<?php

class Blogs
{
    public int $blogId;
    public function __construct()
    {
    }

    public function getarticle($blogId)
    {
        $sql = DB::getInstance()->prepare(
            "Select * from Blogs where blogId ='$blogId' "
        );
        $sql->execute();
        $result = $sql->setFetchMode(\PDO::FETCH_ASSOC);
        foreach (new \RecursiveArrayIterator($sql->fetchAll()) as $k => $v) {
            return $v;
        }
    }

    public function getallArticles()
    {
        $sql = DB::getInstance()->prepare(
            "Select * from Blogs"
        );
        $sql->execute();
        $result = $sql->setFetchMode(\PDO::FETCH_ASSOC);
        $html = '  <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Blog Id</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Description</th>
                    <th scope="col">Article</th>
                    <th scope="col">Status</th>
                    <th scope="col">Trending</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>';
        foreach (new \RecursiveArrayIterator($sql->fetchAll()) as $k => $v) {
            $html .= " <tr>
            <td>$v[blogId]</td>
            <td>$v[userId]</td>
            <td style='width:30%''>$v[description]</td>
            <td><button class='btn bg-danger text-light' id='view' data-blogId=$v[blogId] data-userId=$v[userId]>View</button></td>
            <td>$v[status]</td>
            <td>";
            if ($v['trending'] == 'No') {
                $flag = "Yes";
            } else {
                $flag = 'No';
            }
            $html .= "<select name='cars' id='cars'>
                <option value='volvo'>$v[trending]</option>
                <option value='saab'>$flag</option>
            </select>
            </td>
            <td>$v[date]</td>
        </tr>
            ";
        }
        $html .= "   </tr>
        </tbody>
    </table>";
        return $html;
    }



    public function blogheader()
    {
        return "<header class='row container-fluid mt-3'>
                    <div class='col-3 h3'><a href='../index.php' class='text-decoration-none'>The Blogger</a></div>
                    <div class='col-2'></div>
                    <div class='col-4'><input type='text'>
                        <div class=' ms-2 btn btn-primary'>Search</div>
                    </div>
                    <div class='col-1'><a class='btn border btn-outline-secondary' href='../blog/login.php'>Log In</a></div>
                    <hr class='mt-4'>
                </header>";
    }

    public function blogfooter()
    {
        return " <footer class='text-muted py-5 bg-dark'>
                    <div class='container'>
                        <p class='float-end mb-1'>
                            <a href='#'>Back to top</a>
                        </p>
                        <p class='mb-1'>&copy; CEDCOSS Technologies</p>
                    </div>
                </footer>";
    }

    public function article()
    {

        return " <div class='row mb-2'>
                    <div class='col'>
                        <div class='row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative'>
                            <div class='col p-4 d-flex flex-column position-static'>
                                <strong class='d-inline-block mb-2 text-primary'>World</strong>
                                <h3 class='mb-0'>Featured post</h3>
                                <div class='mb-1 text-muted'>Nov 12</div>
                                <p class='card-text mb-auto'>This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <a href='#' class='stretched-link'>Continue reading</a>
                            </div>
                            <div class='col-auto d-none d-lg-block'>
                                <svg class='bd-placeholder-img' width='200' height='250' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Placeholder: Thumbnail' preserveAspectRatio='xMidYMid slice' focusable='false'>
                                    <title>Placeholder</title>
                                    <rect width='100%' height='100%' fill='#55595c' /><text x='50%' y='50%' fill='#eceeef' dy='.3em'>Thumbnail</text>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                ";
    }

    public function trending()
    {

        return "<div class='row border p-3'>
                    <p class='mt-2 h5'> Blog Title</p>
                    <p class='small mt-0'>Blog Description</p>
                </div>";
    }
}
