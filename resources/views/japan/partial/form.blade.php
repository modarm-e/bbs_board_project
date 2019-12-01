<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    <label for="title">제목</label><br>
    <input  class="title" type="text" name="title" id="title" value="{{old('title', $japan->title)}}" class="form-control" />
        {!! $errors->first('title', '<span class="form-error">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
    <label  for="content">내용</label><br>
    <textarea class="title" name="content" id="content" rows="10" class="form-control">{{old('content', $japan->content)}}</textarea>
        {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
</div>

<div class="form-group1 {{ $errors->has('password') ? 'has-error' : '' }}">
    <label class="left30" for="password">비밀번호</label>
    <input type="password" name="password" id="password" value="{{old('password', $japan->password)}}" class="form-control" />
        {!! $errors->first('password', '<span class="form-error">:message</span>') !!}
</div>

<<<<<<< HEAD
<div class="form-group1 {{ $errors->has('files') ? 'has-error' : '' }}">
    <label class="left30" for="files">파일</label>
    <input type="file" name="files[]" id="files" class="form-control" multiple="multiple" />
    <!-- <div class="form-group filebox {{ $errors->has('files') ? 'has-error' : '' }}">
    <label for="files">파일 업로드</label>
    <input type="file" name="files[]" id="files" multiple="multiple" /> -->
        {!! $errors->first('files.0', '<span class="form-error">:message</span>') !!}
=======
<div class="form-group filebox {{ $errors->has('imgs') ? 'has-error' : '' }}">
    <label for="imgs">파일 업로드</label>
    <input type="file" name="imgs[]" id="imgs" multiple="multiple" />
        {!! $errors->first('imgs.0', '<span class="form-error">:message</span>') !!}
>>>>>>> 6476852aa6d152dfc674eb8220d0bceabcfbfdc1
</div>