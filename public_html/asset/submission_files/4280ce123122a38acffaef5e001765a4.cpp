#include <iostream>
#include <stdlib.h>

using namespace std;

int main()
{
    int t,n,d,r,l,i,g;
    cin >> t;
    int q[t];
    for(i = 1;i <= t;i++)
    {
    g = 0;
    cin >> n >> d >> r;
    int a[n],b[n],c[n],e[n];
    for(l = 1;l <= n;l++)
    {
        cin >> a[l];
    }
    for(l = 1;l <= n;l++)
    {
        cin >> b[l];
    }
    for(l = 1;l <= n;l++)
    {
        c[l] = a[l] - d;
        e[l] = b[l] - d;
    }
    for(l = 1;l <= n;l++)
    {
        if(c[l] < e[l] && c[l] > 0)
        {
            g = c[l] * r + g;
        }
        else if(c[l] > e [l] && e[l] > 0)
        {
            g = e[l] * r + g;
        }
        else if(c[l] == e[l] && c[l] > 0 )
        {
            g = e[l] * r + g;
        }
    }
    q[i] = g;
    }
    for(i = 1;i<=t;i++)
    {
        cout << q[i] << endl;
    }
    cin.get();
    cin.get();
    return 0;
}
