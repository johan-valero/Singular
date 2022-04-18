from django.db import models
import datetime
from django.contrib.auth.models import User

# Create your models here.
class Users(models.Model):
    user = models.OneToOneField(User, on_delete=models.CASCADE, null=True, blank=True)
    avatar_user = models.ImageField(upload_to='Avatar', blank=True)
    
    def __str__(self):
        affiche = f"{self.user.last_name} {self.user.first_name}"
        return affiche

class Adress(models.Model):
    street_adress = models.CharField(max_length=100)
    city_adress = models.CharField(max_length=50)
    cp_adress = models.CharField(max_length=50)

    def readLines(self):
        return f"{self.street_adress} {self.city_adress} {self.cp_adress}"

    def __str__(self):
        affiche = f"{self.street_adress} {self.city_adress} {self.cp_adress}"
        return affiche

class Statut(models.Model):
    name_statut = models.CharField(max_length=50)

    def readLines(self):
        return f"{self.name_statut}"

    def __str__(self):
        affiche = f"{self.name_statut}"
        return affiche

class Creator(models.Model):
    name_creator = models.CharField(max_length=50)
    firstname_creator = models.CharField(max_length=50)
    birthdate_creator = models.DateField("Date de naissance du createur")
    statut = models.ManyToManyField(Statut)
    avatar_creator = models.ImageField(upload_to='pictures_creator', blank=True)

    def readLines(self):
        return f"{self.name_creator}"

    def __str__(self):
        affiche = f"{self.firstname_creator} {self.name_creator}"
        return affiche

class TypeLayout(models.Model):
    name_typeLayout = models.CharField(max_length=50)

    def readLines(self):
        return f"{self.name_typeLayout}"

    def __str__(self):
        affiche = f"{self.name_typeLayout}"
        return affiche

class Layout(models.Model):
    name_layout = models.CharField(max_length=50)
    number_layout = models.IntegerField(default=0)
    type_layout = models.ForeignKey(TypeLayout, on_delete=models.CASCADE)

    def readLines(self):
        return f"{self.name_layout}"

    def __str__(self):
        affiche = f"{self.Layout}"
        return affiche

class SubCategory(models.Model):
    name_subCategory = models.CharField(max_length=50)

    def readLines(self):
        return f"{self.name_subCategory}"

    def __str__(self):
        affiche = f"{self.name_subCategory}"
        return affiche

class Category(models.Model):
    name_category = models.CharField(max_length=50)
    avatar_category = models.ImageField(upload_to='pictures_category', blank=True)
    subcategory = models.ManyToManyField(SubCategory)

    def readLines(self):
        return f"{self.name_category}"

    def __str__(self):
        affiche = f"{self.name_category}"
        return affiche

class Publication(models.Model):
    name_publication = models.CharField(max_length=50)
    date_publication = models.DateField("Date de publication")
    description_publication = models.TextField(null=True, blank=True)
    pictures_publication =models.avatar_user = models.ImageField(upload_to='Pictures_publication', blank=True)
    users = models.ManyToManyField(User, through='Favorite', blank=True)
    adress = models.ForeignKey(Adress, on_delete=models.CASCADE)
    creator = models.ForeignKey(Creator, on_delete=models.CASCADE, null=True, blank=True)
    category = models.ManyToManyField(SubCategory)
    layout = models.ManyToManyField(Layout, blank=True)

    def early_publish(self):
        now = timezone.now()
        return now - datetime.timedelta(days=7) <= self.date_publication <= now

    def readLines(self):
        return f"{self.name_publication}"

    def __str__(self):
        affiche = f"{self.name_publication}"
        return affiche

class Favorite(models.Model):
    publication = models.ForeignKey(Publication, on_delete=models.CASCADE)
    user = models.ForeignKey(User, on_delete=models.CASCADE)
    favorite = models.BooleanField(default=False)

class Rate(models.Model):
    comments = models.TextField()
    choice = (
            (1, 'Mauvais'),
            (2, 'Faible'),
            (3, 'Moyen'),
            (4, 'Intéressant'),
            (5, 'Incroyable !'),
    ) 
    note = models.IntegerField(choices=choice, default=0)
    user = models.ForeignKey(User, on_delete=models.CASCADE)
    publication = models.ForeignKey(Publication, on_delete=models.CASCADE)

    def __str__(self):
        affiche = f"{self.note} {self.comments}"
        return affiche
