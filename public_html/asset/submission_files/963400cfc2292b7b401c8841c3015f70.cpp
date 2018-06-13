#include<stdio.h>
#include<iostream>
#include<algorithm>
#include<math.h>
using namespace std;

long long kombinasi(long long n, long long r)
{              long long hasil=1, temp,i;
                temp = n - r;
                if(temp>=r)
                {for(i = n; i>temp; i--)
                {hasil = hasil * i;}
                for(i = n; i>temp; i--)
                {hasil = hasil / (i-temp);}}
                else if(temp<r)
                {for(i = n; i>r; i--)
                {hasil = hasil * i;}
                for(i = n; i>r; i--)
                {hasil = hasil / (i-temp);}}
                return(hasil);
}
int main()
{
    long long t,p,q,a,i;
    cin>>t;
    while(t--)
    {
     cin>>p;cin>>q;
     for(i=0;i<=q;i++)
     {
      a=pow(p,i)*kombinasi(q,i);
      if(q-i==1){
           if(a==1){cout<<"x"<<" ";}
           else{cout<<a<<"x"<<" ";}}
      else if(q-i==0){cout<<a;}
      else if(q-i>1){
           if(a==1){cout<<"x"<<q-i<<" ";}
           else{cout<<a<<"x"<<q-i<<" ";}}
     }
     cout<<endl;
    }

    return 0;
}
