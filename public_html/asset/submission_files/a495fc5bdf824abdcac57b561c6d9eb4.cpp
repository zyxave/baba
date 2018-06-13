#include <iostream>

using namespace std;

int main()
{
    int t,p,a,m,r,d,c,i;
    cin >> t;
    d = 0;
    c = 0;
    for(i = 1;i <= t;i++)
    {
    cin >> p >> a >> m >> r;
    while(c <= r)
    {
        if(p >= m)
        {
            c = c + p;
            p = p - a;
        }
        else
        {
           c = c + m;
        }
        d = d+1;
    }
    cout << d-1;
    }
    return 0;
}
