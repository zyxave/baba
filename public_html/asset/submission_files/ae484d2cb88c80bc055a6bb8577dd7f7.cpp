#include<bits/stdc++.h>
using namespace std;
int t,res,ans,leng,a,b,c;
char s[100004];
int main()
{
	scanf("%d",&t);
	while(t--)
	{
		scanf("%s",&s);
		leng=strlen(s)	;
		if(leng>1)
		{
			res=2;
		}
		else if(leng==1) res=1;
		for(a=2;a<leng;a++)
		{
			int anss=0;
			for(b=0;b<a;b++)
			{
				if(s[a]==s[b])
				{
					ans=1;
					for(c=b+1;c<a;c++)
					{
					//	printf("%d %d %d %d\n",a,b,c,res);
					//	printf("%c %c\n",s[c],s[a+c-b]);
						if(s[c]!=s[a+c-b])
						{
							break;
						}
						ans++;
					}
					anss=max(anss,ans);
				}
			}
			if(anss>2) res+=2,a+=anss-1;
			else res++;
		}
		printf("%d\n",res);
	}
}
