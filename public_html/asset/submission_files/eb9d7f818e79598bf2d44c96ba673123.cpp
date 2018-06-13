#include <bits\stdc++.h>
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
		while (r>p)
		{
			r-=p;
			if (p>=m+a)
			{
				p-=a;
			}
			else
			if (p<=m+a)
			{
				p=m;
			}
			ans++;
		}
		printf("%d\n", ans);
	}
}
