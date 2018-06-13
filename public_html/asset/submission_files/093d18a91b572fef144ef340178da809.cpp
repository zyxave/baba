#include<bits/stdc++.h>
using namespace std;
int t,i,j,n,d,r,a,b,res,temp,X[101],Y[101];
int main()
{
    cin>>t;
    for(i=1;i<=t;i++)
    {
        cin>>n>>d>>r;
        for(j=0;j<n;j++) cin>>X[j];
        for(j=0;j<n;j++) cin>>Y[j];
        sort(X,X+n);
        sort(Y,Y+n);
        a=0;
        b=n-1;
        res=0;
        for(j=0;j<n;j++)
        {
            temp=(X[a]+Y[b])-d;
            if(temp<0) temp=0;
            res+=(temp*r);
            a++;
            b--;
        }
        cout<<res<<endl;
    }
}
