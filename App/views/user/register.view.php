{% extends "Core.view.php" %}

{%block title %} {{ title }} {% endblock %}

{% block body %}
  <style>
    #message-response {
      font-size: 14px;
    }
  </style>
    <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Create an account</div>
      <div class="card-body">
        <div id="response-msg"></div>
        <form id="frmRegister" method="POST" action="/submit/register">
          <div class="form-group">
          <label for="username"> Username</label>
          <input type="text" id="username" name="username" class="form-control" placeholder="Enter username">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">First name</label>
                <input class="form-control" id="firstName" name="firstName" type="text" aria-describedby="nameHelp" placeholder="Enter first name">
              </div>
              <div class="col-md-6 has-success">
                <label for="exampleInputLastName">Last name</label>
                <input class="form-control" id="lastName" name="lastName" type="text" aria-describedby="nameHelp" placeholder="Enter last name">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="email" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
  
          <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" id="phone" class="form-control" name="phone" placeholder="Phone number">
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="password">Password</label>
                <input class="form-control" id="password" name="password" type="password" placeholder="Password">
              </div>
              <div class="col-md-6">
                <label for="confirmPassword">Confirm password</label>
                <input class="form-control" name="confirmPassword"  id="confirmPassword" type="password" placeholder="Confirm password">
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.html">Login Page</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
{% endblock %}

{% block footer %}
  {{ parent() }}
  <script src="/assets/template/libs/validate/jquery.validate.min.js"></script>
  <script src="/dist/app.js" type="module"></script>
{% endblock %}
