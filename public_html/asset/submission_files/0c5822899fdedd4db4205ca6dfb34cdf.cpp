#include <bits/stdc++.h>
using namespace std;

int main()
{
	int a;
	scanf("%d",&a);
	for(int b=0;b<a;b++)
	{
		int c;
		scanf("%d",&c);
		int d;
		int e=1;
		for(d=2;e<c;d++)
		{
			e=e+d;
		}
		printf("%d\n",d);
	}
	return 0;
}
