from django.urls import path 
from . import views

app_name = 'discover'
urlpatterns = [
    path('', views.index, name= 'index'),
    path('<int:publication_id>/detail/', views.detail, name='detail'),
    path('register/', views.register, name='register'),
    path('registered/', views.registered, name='registered'),
    path('login/', views.my_login, name='login'),
    path('logout/', views.my_logout, name='logout'),
    path('welcome/', views.welcome, name='welcome'),
    path('category/', views.category, name='category'),
    path('search/', views.search, name='search'),
    path('search_result/', views.search_result, name='search_result'),
    path('<int:category_id>/category_detail/', views.category_detail, name='category_detail'),
]   