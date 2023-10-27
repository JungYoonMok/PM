<div class="container">
  <? echo form_open("members/login"); ?>

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

    <button type="submit">로그인</button>
    <a href="/crud/members/join">회원가입</a>
    <? form_close(); ?>
</div>