#include<bits/stdc++.h>
using namespace std;
int main()
{
    int a,b,x,y,z;
    cin>>a;
    for (int i=0;i<a;i++)
    {
        cin>>b;
        if (b>=100)
        {
            b=b-100;
            cout<<29+b<<endl;
        }
        else if (b>=21)
        {
            x=b/10;
            y=b-(x*10);
            if (y==0)
            {
                cout<<10+(y-1)+10<<endl;
            }
            else
            {
                cout<<10+x+y<<endl;
            }
        }
        else
        {
            cout<<b<<endl;
        }
    }
}
