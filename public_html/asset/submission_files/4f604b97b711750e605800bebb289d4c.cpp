#include <bits/stdc++.h>
    using namespace std;

int p,a,m,r,x,y,z,i;
//p = harga asli
//a = diskon
//m = harga minimum
//r = uang
//x = banyak game yg dibeli
//z = total harga

int main ()
{
    cin>>y;
    for (int i=1;i<=y;i++)
        {
            cin>>p>>a>>m>>r;
            x=0;
            z=0;
            while (z<=r)
            {
                z=z+p;
                p=p-a;
                if (p<m) p=m;
                x++;
            }
            x=x-1;
            cout<<x<<endl;
        }
}
