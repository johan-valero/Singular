from django.contrib import admin
from .models import Users, Adress, Statut, Creator, TypeLayout, Layout, SubCategory, Category, Publication, Favorite, Rate

# Register your models here.
admin.site.register(Users)
admin.site.register(Adress)
admin.site.register(Statut)
admin.site.register(Creator)
admin.site.register(TypeLayout)
admin.site.register(Layout)
admin.site.register(SubCategory)
admin.site.register(Category)
admin.site.register(Publication)
admin.site.register(Favorite)
admin.site.register(Rate)
