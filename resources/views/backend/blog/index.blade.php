@extends('layouts.backend.main')

@section('title', 'Blog | Lists')

@section('content')

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Blog
          <small>Display All blog posts</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>

          <li><a href="{{ url('backend/index') }}">Blog</a></li>
          <li active>All Posts</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <div class="pull-left">
                        <a href="{{ url('backend/blog/create') }}" class="btn btn-success"> Create New</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                    @if(session('message'))
                      <div class="alert alert-success">
                        {{ session('message') }}
                      </div>
                    @endif

                    @if( ! $posts->count())
                      <div class="alert alert-danger">
                          <strong>No record found! </strong>
                      </div>
                     @else
                    <table class="table table-bordered">
                      <thead>
                          <tr>

                              <td>Title</td>
                              <td width="150">Author</td>
                              <td width="200">Category</td>
                              <td width="170">Date | Status</td>
                              <td width="90">Action</td>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($posts as $post)

                              <tr>

                                  <td>{{ $post->title }}</td>
                                  <td>{{ $post->author->name }}</td>
                                  <td>{{ $post->category->title }}</td>
                                  <td>
                                      <abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr> |
                                      {!! $post->publicationLabel() !!}
                                  </td>
                                  <td>
                                      <a href="{{ url('backend/blog/edit', $post->id) }}" class="btn btn-xs btn-default">
                                          <i class="fa fa-edit"></i>
                                      </a>
                                      <a href="{{ url('backend/blog/destroy', $post->id) }}" class="btn btn-xs btn-danger">
                                          <i class="fa fa-trash"></i>
                                      </a>
                                  </td>
                              </tr>

                          @endforeach
                      </tbody>
                    </table>
                  @endif
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="pull-left">
                        {{ $posts->render() }}
                    </div>
                    <div class="pull-right">
                        <?php $postCount = $posts->count() ?>
                        <small>{{ $postCount }} {{ str_plural('Item', $postCount) }}</small>
                    </div>
                </div>
              </div>
              <!-- /.box -->
            </div>
          </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
    </script>
@endsection
