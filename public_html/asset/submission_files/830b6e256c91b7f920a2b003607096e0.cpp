#include <iostream>
#include <stdio.h>
using namespace std;
#define MAX 100000

int main(){
long p[MAX],m[MAX],a[MAX],r[MAX],T,sisa_uang[MAX],harga_sementara[MAX];
cin>>T;
for (long b=0;b<T;b++){
    cin>>p[b];
    cin>>a[b];
    cin>>m[b];
    cin>>r[b];
    sisa_uang[b]=r[b]-p[b];}
for (long b=0;b<T;b++){
    long jumlah=1;
    long selesai= 0; 

    
    while(selesai!=1){
        harga_sementara[b] =p[b]-a[b];
        if(harga_sementara[b]>=m[b]){
            p[b]=harga_sementara[b];
        }else{
            p[b]=m[b];
        }
        sisa_uang[b]=sisa_uang[b] - p[b];
        if(sisa_uang[b]>0){
            jumlah+=1;
        }else{
            selesai=1;
        }
           
    }
     cout<<jumlah<<endl;    
}
}