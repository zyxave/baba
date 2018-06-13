#include <iostream>
#include <stdlib.h>

using namespace std;

int main()
{
    int t,n,d,r,l,i,g;
    g = 0;
    cin >> t;
    for(i = 1;i <= t;i++)
    {
    cin >> n >> d >> r;
    int a[n],b[n],c[n],e[n];
    for(l = 1;l <=n;l++)
    {
        cin >> a[l];
    }
    cout << " ";
    for(l = 1;l <= n;l++)
    {
        cin >> b[l];
    }
    for(l = 1;l <=1;l++)
    {
        c[l] = a[l] - d;
        e[l] = b[l] - d;
    }
    for(l = 1;l <= 1;l++)
    {
        if(c[l] < e[l] && c[l] > 0)
        {
            g = c[l] * r + g;
        }
        else if(c[l] > e [l] && e[l] > 0)
        {
            g = e[l] * r + g;
        }
    }
    cout << g;
    }
    return 0;
}
