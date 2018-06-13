#include <bits/stdc++.h>
    using namespace std;

int x[101],y[101],n,a,b,d,r,t,z[101],c,e;

int main ()
{
    cin>>t;
    for (int i=1;i<=t;i++)
        {
            cin>>n>>d>>r;
            c=0;
            for (int j=1;j<=n;j++)
                cin>>x[j];
            for (int j=1;j<=n;j++)
                cin>>y[j];
            for (int j=1;j<=n;j++)
                z[j]=x[j]+y[j];
            for (int j=i;j<=n;j++)
                if (z[j]>d){c=c+(z[j]-d);}
            e=c*r;
            cout<<e<<endl;
        }
}
