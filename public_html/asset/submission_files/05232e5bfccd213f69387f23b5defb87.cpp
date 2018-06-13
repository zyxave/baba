#include<bits/stdc++.h>
using namespace std;
unsigned long long pw(unsigned long long a,unsigned long long b)
{
    if(b==0)return 1;
    return pw(a,b-1)*a;
}
unsigned long long segitigapascal(unsigned long long baris,unsigned long long posisi)
{
    if(posisi==0||posisi==baris)
    {
        return 1;
    } else
    {
        return segitigapascal(baris-1,posisi)+segitigapascal(baris-1,posisi-1);
    }
}
int main()
{
    unsigned long long p,q,i,sp[10000],sum,n,j;
    cin>>n;
    for(i=0; i<n; i++)
    {
        cin>>p>>q;
        sum=q;
        for(j=0; j<q+1; j++)
        {
            sp[j]=segitigapascal(q,j);
            if(j>0){printf("%llu",sp[j]*pw(p,j));}
            if(j<q){cout<<"x";}
            if(j<q-1){cout<<sum;}
            if(j<q){cout<<" ";}
            sum--;
        }
        cout<<endl;
    }

}
