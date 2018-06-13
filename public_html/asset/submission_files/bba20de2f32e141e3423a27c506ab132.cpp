#include<bits/stdc++.h>
using namespace std;
int segitigapascal(int baris,int posisi)
{
    if(posisi==0||posisi==baris)
    {
        return 1;
    }
    else
    {
        return segitigapascal(baris-1,posisi)+segitigapascal(baris-1,posisi-1);
    }
}
int main()
{
    long long p,q,i,sp[10000],sum,n,j;
    cin>>n;
    for(i=0; i<n; i++)
    {
        cin>>p>>q;
        sum=q;
        for(j=0; j<q+1; j++)
        {
            sp[j]=segitigapascal(q,j);
            if(j>0){printf("%lld",sp[j]*pow(p,j));}
            if(j<q){cout<<"x";}
            if(j<q-1){cout<<sum;}
            if(j<q){cout<<" ";}
            sum--;
        }
        cout<<endl;
    }

}
