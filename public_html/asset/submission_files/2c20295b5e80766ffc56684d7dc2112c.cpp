#include <bits/stdc++.h>
using namespace std;

int main ()
{
	int t;
	scanf("%d", &t);
	for (int tc=0; tc<t; tc++)
	{
		int ans=0;
		int p,a,m,r;
		scanf("%d %d %d %d", &p, &a, &m, &r);
		while (r>=p)
		{
			r-=p;
			if (p-a>=m)
			{
				p-=a;
			}
			else
			{
				p=m;
			}
			ans++;
		}
		printf("%d\n", ans);
	}
}
