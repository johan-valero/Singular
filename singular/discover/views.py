from django.shortcuts import render, get_object_or_404
from django.http import HttpResponse
from django.contrib.auth.models import User
from django.contrib.auth import authenticate, login , logout
from . models import Publication, Users, Adress, Statut, Creator, Layout, TypeLayout, SubCategory, Category, Favorite, Rate
from django import template
from django.template.loader import get_template 
from django.template import loader

# Create your views here.
def index(request):
    last_publish = Publication.objects.order_by('id')
    category =  Category.objects.all()
    subcategory =  SubCategory.objects.all()
    context = {
        'publish_list': last_publish,
        'category': category ,
        'subcategory': subcategory
    }
    return render(request, 'discover/index.html', context)

def detail(request, publication_id):
    detail = get_object_or_404(Publication, pk=publication_id)
    context = {'detail': detail}
    return render(request, 'discover/places/detail.html', context)

def my_login(request):
    return render(request, 'discover/account/login.html')

def welcome(request):
    username = request.POST['username']
    password = request.POST['password']
    user = authenticate(request, username=username, password=password)
    context = {'user':user}
    if user is not None :
        login(request, user)
        return render(request, 'discover/account/welcome.html', context)
    else:
        return render(request, 'discover/account/error_log.html')

def my_logout(request):
    logout(request)
    return render(request, 'discover/account/logout.html')

def register(request):
    return render(request, 'discover/account/register.html')

def registered(request):
    name = request.POST['user_name']
    firstname = request.POST['user_firstname']
    pwd = request.POST['user_pwd']
    email = request.POST['user_email']
    avatar = request.POST['user_avatar']
    username = firstname[0].lower() + "." + name.lower()
    user = User.objects.create_user(username, email, pwd)
    utilisateur = Users(user=user)
    user.last_name = name
    user.first_name = firstname
    utilisateur.avatar_user = avatar
    user.save()
    utilisateur.save()
    context = {'user':user}
    return render(request, 'discover/account/registered.html', context)
        # return render(request, 'discover/error_log_inscription.html')

def category(request):
    category = Category.objects.order_by('id')
    subcategory = SubCategory.objects.order_by('id')
    context = {'category': category, 'subcategory': subcategory }

    return render(request, 'discover/places/category.html', context)

def category_detail(request, category_id):
    category_detail = get_object_or_404(Category, pk='category_id')
    context = {"category_detail": category_detail}
    return render(request, 'discover/places/category_detail.html', context) 

def search(request):

    if request.method == 'POST': 
        searchInput = request.POST["searchInput"]
        searchInput.lower()

        cate = Category.objects.all()
        crea = Creator.objects.all()
        subcate = SubCategory.objects.all()
        pub = Publication.objects.all()
        lay = Layout.objects.all()
        typelay = TypeLayout.objects.all()
        adr = Adress.objects.all()
        stat = Statut.objects.all()

        category = []
        creator = []
        subcategory = []
        publication = []
        layout = []
        typelayout = []
        adress = []
        statut = []

        for item in cate:
            info = item.readLines().lower()
            if info.find(searchInput) != -1:
                category.append(item)

        for item in crea:
            info = item.readLines().lower()
            if info.find(searchInput) != -1:
                creator.append(item)

        for item in subcate:
            info = item.readLines().lower()
            if info.find(searchInput) != -1:
                subcategory.append(item)

        for item in pub:
            info = item.readLines().lower()
            if info.find(searchInput) != -1:
                publication.append(item)

        for item in lay:
            info = item.readLines().lower()
            if info.find(searchInput) != -1:
                layout.append(item)

        for item in typelay:
            info = item.readLines().lower()
            if info.find(searchInput) != -1:
                typelayout.append(item)

        for item in adr:
            info = item.readLines().lower()
            if info.find(searchInput) != -1:
                adress.append(item)

        for item in stat:
            info = item.readLines().lower()
            if info.find(searchInput) != -1:
                statut.append(item)

        template = loader.get_template('discover/search/search_result.html')
        context = {
            'category':category, 
            'creator':creator, 
            'subcategory':subcategory, 
            'publication':publication, 
            'layout':layout, 
            'typelayout':typelayout, 
            'adress':adress, 
            'statut':statut }

        return HttpResponse(template.render(context, request))
    else:
        return render(request, 'discover/search/search.html')

def search_result(request):
    return render(request, 'discover/search/search_result.html')
