{% extends "Core.view.php" %}

{%block title %} Test {% endblock %}

{% block body %}
<style>
  .row {
    color: #fff;
  }
</style>
 <div class="container">
  <div class="card card-register mx-auto mt-5">
      <div class="card-body text-center">
            <img src="/assets/template/images/icon-success.png" style="width: 80px" alt="">
            <label class="mx-auto mt-3">Thanks for registration! One more step to finish. Please check your email inbox (or spam) to confirm the registration.</label>

            <a href="" class="btn btn-primary btn-sm mt-3">Go to login</a>
      </div>
    </div>
 </div>
{% endblock %}

{% block footer %}
  {{ parent() }}
  <script src="/dist/app.js" type="module"></script>
{% endblock %}
