{% extends "Core.view.php" %}

{%block title %} {{ title }} {% endblock %}

{% block body %}
  <style>
    #message-response {
      font-size: 14px;
    }
  </style>
    <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <div id="message-response"></div>
        <form method="POST" action="/submit/login" id="frm_Login"  role="form" data-toggle="validator">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" name="username" id="txtUsername" type="text" placeholder="Username or email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" name="password" id="txtPassword" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block btn-submit">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
{% endblock %}

{% block footer %}
  {{ parent() }}
  <script src="/dist/app.js" type="module"></script>
{% endblock %}
