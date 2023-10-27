<div class="container">
  <? echo form_open("members/store"); ?>

    <dl>
      <dt>email</dt>
      <dd>
        <input type="text" name="email" value="" />
      </dd>
    </dl>
    
    <dl>
      <dt>password</dt>
      <dd>
        <input type="password" name="password" value="" />
      </dd>
    </dl>

    <a href="/crud">홈</a>
    <a href="/crud/members/login">뒤로가기</a>
    <button type="submit">회원가입</button>
    <? form_close(); ?>
</div>