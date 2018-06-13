#include<bits/stdc++.h>
using namespace std;
int main()
{
    int t,p,m,a,r,y,h;
    cin>>t;
    for (int i=1;i<=t;i++)
    {
        y=0;
        cin>>p>>a>>m>>r;
        h=p;
        while (r>=0)
        {
            r=r-h;
            if (r>=0) {y++;}
            if ((h-a)>m) {h=h-a;}
            else if ((h-a)<=m) {h=m;}
        }
        cout<<"Case #"<<i<<": "<<y<<endl;
    }
}
